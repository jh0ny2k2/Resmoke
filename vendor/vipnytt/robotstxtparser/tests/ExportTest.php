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
 * Class ExportTest
 *
 * @package vipnytt\RobotsTxtParser\Tests
 */
class ExportTest extends TestCase
{
    /**
     * @dataProvider generateDataForTest
     * @param string $robotsTxtContent
     * @param array $export
     * @param string|false $rendered
     */
    public function testExport($robotsTxtContent, $export, $rendered)
    {
        $parser = new RobotsTxtParser\TxtClient('http://example.com', 200, $robotsTxtContent);
        $this->assertInstanceOf('vipnytt\RobotsTxtParser\TxtClient', $parser);

        $this->assertEquals($export, $parser->export());

        if ($rendered !== false) {
            $this->assertEquals($rendered['compressed'], $parser->render()->compressed("\n"));
            $this->assertEquals($rendered['normal'], $parser->render()->normal("\n"));
            $this->assertEquals($rendered['compatibility'], $parser->render()->compatibility("\n"));
            foreach ($rendered as $robotstxt) {
                $this->testExport($robotstxt, $export, false);
            }
            $import = new RobotsTxtParser\Import($export, 'http://example.com');
            $this->assertInstanceOf('vipnytt\RobotsTxtParser\Import', $import);

            $this->assertEquals($export, $import->export());
            $this->assertEquals([], $import->getIgnoredImportData());

            $this->assertEquals($rendered['compressed'], $import->render()->compressed("\n"));
            $this->assertEquals($rendered['normal'], $import->render()->normal("\n"));
            $this->assertEquals($rendered['compatibility'], $import->render()->compatibility("\n"));
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
Allow: /public
Noindex: /private
Crawl-delay: 5
Cache-delay: 10
Request-rate: 1200/3h 09.00-15.00
Request-rate: 1000/1h
Visit-time: 01.23-23.01
Robot-version 2.0
Comment: Please honor the robots.txt rules. Thanks!

User-agent: Yahoo! slurp
User-agent: Bingbot
Disallow: /

User-agent: DuckDuckGo
Disallow: /

Host: example.com

Sitemap: http://example.com/sitemap.xml
Sitemap: HTTP://EXAMPLE.COM/sitemap.xml.gz
ROBOTS
                ,
                [
                    'host' => 'example.com',
                    'clean-param' => [],
                    'sitemap' => [
                        'http://example.com/sitemap.xml',
                        'http://example.com/sitemap.xml.gz',
                    ],
                    'user-agent' => [
                        '*' => [
                            'robot-version' => null,
                            'visit-time' => [
                                [
                                    'from' => '0123',
                                    'to' => '2301',
                                ],
                            ],
                            'noindex' => [
                                '/private',
                            ],
                            'disallow' => [
                                '/admin/',
                            ],
                            'allow' => [
                                '/public',
                            ],
                            'crawl-delay' => 5,
                            'cache-delay' => 10,
                            'request-rate' => [
                                [
                                    'rate' => 9,
                                    'ratio' => '1/9s',
                                    'from' => '0900',
                                    'to' => '1500',
                                ],
                                [
                                    'rate' => 3.6,
                                    'ratio' => '5/18s',
                                    'from' => null,
                                    'to' => null,
                                ],
                            ],
                            'comment' => [
                                'Please honor the robots.txt rules. Thanks!'
                            ],
                        ],
                        'yahoo! slurp' => [
                            'robot-version' => null,
                            'visit-time' => [],
                            'noindex' => [],
                            'disallow' => [
                                '/',
                            ],
                            'allow' => [],
                            'crawl-delay' => null,
                            'cache-delay' => null,
                            'request-rate' => [],
                            'comment' => [],
                        ],
                        'bingbot' => [
                            'robot-version' => null,
                            'visit-time' => [],
                            'noindex' => [],
                            'disallow' => [
                                '/',
                            ],
                            'allow' => [],
                            'crawl-delay' => null,
                            'cache-delay' => null,
                            'request-rate' => [],
                            'comment' => [],
                        ],
                        'duckduckgo' => [
                            'robot-version' => null,
                            'visit-time' => [],
                            'noindex' => [],
                            'disallow' => [
                                '/',
                            ],
                            'allow' => [],
                            'crawl-delay' => null,
                            'cache-delay' => null,
                            'request-rate' => [],
                            'comment' => [],
                        ],
                    ],
                ],
                [
                    'compressed' => <<<COMPRESSED
host:example.com
sitemap:http://example.com/sitemap.xml
sitemap:http://example.com/sitemap.xml.gz
user-agent:*
visit-time:0123-2301
noindex:/private
disallow:/admin/
allow:/public
crawl-delay:5
cache-delay:10
request-rate:1/9s 0900-1500
request-rate:5/18s
comment:Please honor the robots.txt rules. Thanks!
user-agent:bingbot
user-agent:duckduckgo
user-agent:yahoo! slurp
disallow:/
COMPRESSED
                    ,
                    'normal' => <<<NORMAL
Host: example.com

Sitemap: http://example.com/sitemap.xml
Sitemap: http://example.com/sitemap.xml.gz

User-agent: *
Visit-time: 0123-2301
Noindex: /private
Disallow: /admin/
Allow: /public
Crawl-delay: 5
Cache-delay: 10
Request-rate: 1/9s 0900-1500
Request-rate: 5/18s
Comment: Please honor the robots.txt rules. Thanks!

User-agent: bingbot
User-agent: duckduckgo
User-agent: yahoo! slurp
Disallow: /
NORMAL
                    ,
                    'compatibility' => <<<COMPATIBILITY
User-agent: yahoo! slurp
Disallow: /

User-agent: duckduckgo
Disallow: /

User-agent: bingbot
Disallow: /

User-agent: *
Visit-time: 0123-2301
Noindex: /private
Disallow: /admin/
Allow: /public
Crawl-delay: 5
Cache-delay: 10
Request-rate: 1/9s 0900-1500
Request-rate: 5/18s
Comment: Please honor the robots.txt rules. Thanks!

Host: example.com

Sitemap: http://example.com/sitemap.xml
Sitemap: http://example.com/sitemap.xml.gz

COMPATIBILITY
                    ,
                ]
            ]
        ];
    }
}
