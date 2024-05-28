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
 * Class UnlistedTest
 *
 * @package vipnytt\RobotsTxtParser\Tests
 */
class UnlistedTest extends TestCase
{
    /**
     * @dataProvider generateDataForTest
     * @param string $robotsTxtContent
     * @param string|false $rendered
     * @throws RobotsTxtParser\Exceptions\ClientException
     */
    public function testUnlisted($robotsTxtContent, $rendered)
    {
        $parser = new RobotsTxtParser\TxtClient('http://example.com', 200, $robotsTxtContent);
        $this->assertInstanceOf('vipnytt\RobotsTxtParser\TxtClient', $parser);

        $this->assertTrue($parser->userAgent('*')->isAllowed('/path/'));
        $this->assertFalse($parser->userAgent('*')->isDisallowed('/path/'));
        $this->assertTrue($parser->userAgent()->isAllowed('/path/'));
        $this->assertFalse($parser->userAgent()->isDisallowed('/path/'));

        $this->assertTrue($parser->host()->isPreferred());

        if ($rendered !== false) {
            $this->assertEquals($rendered, $parser->render()->normal("\n"));
            $this->testUnlisted($rendered, false);
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
Disallow: /admin/
Allow: /public/
ROBOTS
                ,
                <<<RENDERED
User-agent: *
Disallow: /admin/
Allow: /public/
RENDERED
            ]
        ];
    }
}
