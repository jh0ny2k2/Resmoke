<?php
/**
 * vipnytt/RobotsTxtParser
 *
 * @link https://github.com/VIPnytt/RobotsTxtParser
 * @license https://github.com/VIPnytt/RobotsTxtParser/blob/master/LICENSE The MIT License (MIT)
 */

namespace vipnytt\RobotsTxtParser\Tests;

use PHPUnit\Framework\TestCase;
use vipnytt\RobotsTxtParser;

/**
 * Class EscapingTest
 *
 * @package vipnytt\RobotsTxtParser\Tests
 */
class EscapingTest extends TestCase
{
    /**
     * @dataProvider generateDataForTest
     * @param string $robotsTxtContent
     * @param string|false $rendered
     * @throws RobotsTxtParser\Exceptions\ClientException
     */
    public function testEscaping($robotsTxtContent, $rendered)
    {
        $parser = new RobotsTxtParser\TxtClient('http://example.com', 200, $robotsTxtContent);
        $this->assertInstanceOf('vipnytt\RobotsTxtParser\TxtClient', $parser);

        $this->assertTrue($parser->userAgent()->isAllowed("/%5C."));
        $this->assertFalse($parser->userAgent()->isDisallowed("/%5C."));

        $this->assertTrue($parser->userAgent()->isDisallowed("/("));
        $this->assertFalse($parser->userAgent()->isAllowed("/("));

        $this->assertTrue($parser->userAgent()->isDisallowed("/)"));
        $this->assertFalse($parser->userAgent()->isAllowed("/)"));

        $this->assertTrue($parser->userAgent()->isAllowed("/+"));
        $this->assertFalse($parser->userAgent()->isDisallowed("/+"));

        if ($rendered !== false) {
            if (version_compare(phpversion(), '7.0.0', '<')) {
                $this->markTestIncomplete('Sort algorithm changed as of PHP 7');
            }
            $this->assertEquals($rendered, $parser->render()->normal("\n"));
            $this->testEscaping($rendered, false);
        }
    }

    /**
     * Generate test data
     *
     * @return array
     */
    public function generateDataForTest()
    {
        return [
            [
                <<<ROBOTS
User-agent: *
Disallow: /(
Disallow: /)
Disallow: /.
ROBOTS
                ,
                <<<RENDERED
User-agent: *
Disallow: /.
Disallow: /)
Disallow: /(
RENDERED
            ]
        ];
    }
}
