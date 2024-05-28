<?php

namespace Vormkracht10\Seo\Checks\Performance;

use Illuminate\Http\Client\Response;
use Symfony\Component\DomCrawler\Crawler;
use Vormkracht10\Seo\Interfaces\Check;
use Vormkracht10\Seo\Traits\PerformCheck;
use Vormkracht10\Seo\Traits\Translatable;

class ResponseCheck implements Check
{
    use PerformCheck,
        Translatable;

    public string $title = 'The page response returns a 200 status code';

    public string $description = 'The page response should return a 200 status code because this means the page is available.';

    public string $priority = 'high';

    public int $timeToFix = 10;

    public int $scoreWeight = 5;

    public bool $continueAfterFailure = false;

    public ?string $failureReason;

    public mixed $actualValue = null;

    public mixed $expectedValue = 200;

    public function check(Response $response, Crawler $crawler): bool
    {
        /** @phpstan-ignore-next-line */
        $this->actualValue = $response->getStatusCode();

        /** @phpstan-ignore-next-line */
        if ($response->getStatusCode() === 200) {
            return true;
        }

        $this->failureReason = __('failed.performance.response', [
            'actualValue' => $this->actualValue,
            'expectedValue' => $this->expectedValue,
        ]);

        return false;
    }
}
