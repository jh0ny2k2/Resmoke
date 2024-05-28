<?php
/**
 * vipnytt/RobotsTxtParser
 *
 * @link https://github.com/VIPnytt/RobotsTxtParser
 * @license https://github.com/VIPnytt/RobotsTxtParser/blob/master/LICENSE The MIT License (MIT)
 */

namespace vipnytt\RobotsTxtParser\Client\Directives;

use vipnytt\RobotsTxtParser\Handler\Directives\SubDirectiveHandler;

/**
 * Class UserAgentClient
 *
 * @see https://github.com/VIPnytt/RobotsTxtParser/blob/master/docs/methods/UserAgentClient.md for documentation
 * @package vipnytt\RobotsTxtParser\Client\Directives
 */
class UserAgentClient extends UserAgentTools
{
    /**
     * User-agent
     * @var string
     */
    private $product;

    /**
     * UserAgentClient constructor.
     *
     * @param SubDirectiveHandler $handler
     * @param string $baseUri
     * @param int|null $statusCode
     * @param string $product
     */
    public function __construct(SubDirectiveHandler $handler, $baseUri, $statusCode, $product)
    {
        parent::__construct($handler, $baseUri, $statusCode);
        $this->product = $product;
    }

    /**
     * Allow
     *
     * @return AllowClient
     */
    public function allow()
    {
        return $this->handler->allow->client();
    }

    /**
     * Cache-delay
     *
     * @return DelayClient
     */
    public function cacheDelay()
    {
        return $this->handler->cacheDelay->client($this->product, $this->crawlDelay()->getValue());
    }

    /**
     * Crawl-delay
     *
     * @return DelayClient
     */
    public function crawlDelay()
    {
        return $this->handler->crawlDelay->client($this->product);
    }

    /**
     * RequestClient-rate
     *
     * @return RequestRateClient
     */
    public function requestRate()
    {
        return $this->handler->requestRate->client($this->product, $this->crawlDelay()->getValue());
    }

    /**
     * Comment
     *
     * @return CommentClient
     */
    public function comment()
    {
        return $this->handler->comment->client();
    }

    /**
     * Disallow
     *
     * @return AllowClient
     */
    public function disallow()
    {
        return $this->handler->disallow->client();
    }

    /**
     * NoIndex
     *
     * @return AllowClient
     */
    public function noIndex()
    {
        return $this->handler->noIndex->client();
    }

    /**
     * Robot-version
     *
     * @return RobotVersionClient
     */
    public function robotVersion()
    {
        return $this->handler->robotVersion->client();
    }

    /**
     * Visit-time
     *
     * @return VisitTimeClient
     */
    public function visitTime()
    {
        return $this->handler->visitTime->client();
    }
}
