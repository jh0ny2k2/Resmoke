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
 * Class InvalidUriTest
 *
 * @package vipnytt\RobotsTxtParser\Tests
 */
class InvalidUriTest extends TestCase
{
    /**
     * @dataProvider generateDataForTest
     * @param string $base
     */
    public function testInvalidUri($base)
    {
        $this->expectException(\InvalidArgumentException::class);
        new RobotsTxtParser\UriClient($base);
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
                'shttp://example.com',
            ],
            [
                'htp://example.com',
            ],
            [
                'fttp://example.com',
            ],
            [
                'http://example.',
            ],
        ];
    }
}
