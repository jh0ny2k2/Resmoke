<?php

namespace Vormkracht10\Seo\Checks\Content;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use Vormkracht10\Seo\Interfaces\Check;
use Vormkracht10\Seo\Traits\PerformCheck;
use Vormkracht10\Seo\Traits\Translatable;

class KeywordInTitleCheck implements Check
{
    use PerformCheck,
        Translatable;

    public string $title = 'The page has the focus keyword in the title';

    public string $description = 'The focus keyword should be in the title of the page because the visitor will see this in the search results.';

    public string $priority = 'medium';

    public int $timeToFix = 1;

    public int $scoreWeight = 5;

    public bool $continueAfterFailure = true;

    public ?string $failureReason;

    public mixed $actualValue = null;

    public mixed $expectedValue = null;

    public function check(Response $response, Crawler $crawler): bool
    {
        if (! $this->validateContent($crawler)) {
            $this->failureReason = __('failed.meta.keyword_in_title_check');

            return false;
        }

        return true;
    }

    public function validateContent(Crawler $crawler): bool
    {
        $keywords = $this->getKeywords($crawler);

        if (! $keywords) {
            return false;
        }

        $this->expectedValue = $keywords;

        $title = $crawler->filterXPath('//title')->text();

        if (! $title) {
            return false;
        }

        if (! Str::contains($title, $keywords)) {
            return false;
        }

        return true;
    }

    public function getKeywords(Crawler $crawler): array
    {
        $node = $crawler->filterXPath('//meta[@name="keywords"]')->getNode(0);

        if (! $node) {
            return [];
        }

        $keywords = $crawler->filterXPath('//meta[@name="keywords"]')->attr('content');

        if (! $keywords) {
            return [];
        }

        return explode(', ', $keywords);
    }
}
