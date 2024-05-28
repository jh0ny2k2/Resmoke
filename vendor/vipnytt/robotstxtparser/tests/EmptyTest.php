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
 * Class EmptyTest
 *
 * @package vipnytt\RobotsTxtParser\Tests
 */
class EmptyTest extends TestCase
{
    /**
     * @dataProvider generateDataForTest
     * @param array $result
     * @param string $rendered
     */
    public function testEmpty($result, $rendered)
    {
        $parser = new RobotsTxtParser\TxtClient('http://example.com', 200, '');
        $this->assertInstanceOf('vipnytt\RobotsTxtParser\TxtClient', $parser);

        $this->assertTrue($parser->userAgent()->isAllowed("/"));
        $this->assertFalse($parser->userAgent()->isDisallowed("/"));

        $this->assertTrue($parser->userAgent('*')->isAllowed("/"));
        $this->assertFalse($parser->userAgent('*')->isDisallowed("/"));

        $this->assertEquals([], $parser->sitemap()->export());

        $this->assertNull($parser->host()->export());

        $this->assertEquals([], $parser->cleanParam()->export());

        $this->assertEquals($result, $parser->export());
        $this->assertEquals('', $parser->render()->compressed("\n"));
        $this->assertEquals('', $parser->render()->normal("\n"));
        $this->assertEquals($rendered, $parser->render()->compatibility("\n"));
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
                [
                    'host' => null,
                    'clean-param' => [],
                    'sitemap' => [],
                    'user-agent' => [],
                ],
                <<<COMPATIBILITY
User-agent: *
Disallow:

COMPATIBILITY
            ],
        ];
    }
}
