<?php

namespace Vormkracht10\Seo\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;
use Vormkracht10\Seo\Events\ScanCompleted;
use Vormkracht10\Seo\Facades\Seo;
use Vormkracht10\Seo\Models\SeoScan as SeoScanModel;
use Vormkracht10\Seo\SeoScore;

class SeoScan extends Command
{
    public $signature = 'seo:scan';

    public $description = 'Scan the SEO score of your website';

    public int $success = 0;

    public int $failed = 0;

    public int $modelCount = 0;

    public int $routeCount = 0;

    public ProgressBar $progress;

    public array $failedChecks = [];

    public SeoScanModel $scan;

    public function handle(): int
    {
        if (empty(config('seo.models')) && ! config('seo.check_routes')) {
            $this->error('No models or routes specified in config/seo.php');

            return self::FAILURE;
        }

        if (config('seo.database.save')) {
            $scan = SeoScanModel::create([
                'total_checks' => getCheckCount(),
                'started_at' => now(),
            ]);

            $this->scan = $scan;
        }

        $startTime = microtime(true);

        $this->info('Please wait while we scan your web page(s)...');
        $this->line('');

        $this->progress = $this->output->createProgressBar(getCheckCount());
        $this->line('');

        if (config('seo.check_routes')) {
            $this->calculateScoreForRoutes();
        }

        if (config('seo.models')) {
            foreach (config('seo.models') as $model) {
                if (is_array($model)) {
                    $this->calculateScoreForModel($model[0], $model[1]);
                } else {
                    $this->calculateScoreForModel($model);
                }
            }
        }

        $totalPages = $this->modelCount + $this->routeCount;

        $this->info('Command completed with '.$this->failed.' failed and '.$this->success.' successful checks on '.$totalPages.' pages.');

        cache()->driver(config('seo.cache.driver'))->tags('seo')->flush();

        if (config('seo.database.save')) {
            $scan->update([
                'pages' => $totalPages,
                'failed_checks' => $this->failedChecks,
                'time' => microtime(true) - $startTime,
                'finished_at' => now(),
            ]);
        }

        event(ScanCompleted::class);

        return self::SUCCESS;
    }

    private function calculateScoreForRoutes(): void
    {
        $routes = self::getRoutes();

        $routes->each(function ($path, $name) {
            $this->progress->start();

            $seo = Seo::check(url: route($name), progress: $this->progress, useJavascript: config('seo.javascript'));

            $this->failed += count($seo->getFailedChecks());
            $this->success += count($seo->getSuccessfulChecks());
            $this->routeCount++;

            if (config('seo.database.save')) {
                $this->saveScoreToDatabase(seo: $seo, url: route($name));
            }

            $this->progress->finish();

            $this->logResultToConsole($seo, route($name));
        });
    }

    private static function getRoutes(): Collection
    {
        $routes = collect(app('router')->getRoutes()->getRoutesByName())
            ->filter(fn ($route) => $route->methods[0] === 'GET');

        // Check if all routes should be checked
        if (in_array('*', Arr::wrap(config('seo.routes')))) {
            $routes = $routes->map(fn ($route) => $route->uri);
        } else {
            // Only check the routes specified in the config
            $routes = $routes->filter(fn ($route) => in_array($route->getName(), Arr::wrap(config('seo.routes'))))
                ->map(fn ($route) => $route->uri);
        }

        // Filter out excluded routes by name
        if (! empty(config('seo.exclude_routes'))) {
            $routes = $routes->filter(fn ($route, $name) => ! in_array($name, config('seo.exclude_routes')));
        }

        // Filter out excluded routes by path
        if (! empty(config('seo.exclude_paths'))) {
            $routes = $routes->filter(function ($route) {
                foreach (config('seo.exclude_paths') as $path) {
                    // if path contains a wildcard, check if the route starts with the path
                    if (str_contains($path, '*')) {
                        $path = str_replace('/*', '', $path);

                        if (str_starts_with($route, $path)) {
                            return false;
                        }
                    }

                    // if path does not contain a wildcard, check if the route contains the path
                    if (str_contains($route, $path)) {
                        return false;
                    }
                }

                return true;
            });
        }

        // Exclude routes that contain a parameter or where it ends with .txt or .xml
        $routes = $routes->filter(fn ($route) => ! str_contains($route, '{') &&
            ! str_ends_with($route, '.txt') &&
            ! str_ends_with($route, '.xml')
        );

        return $routes;
    }

    private function calculateScoreForModel(string $model, ?string $scope = null): void
    {
        $items = new $model;

        if ($scope) {
            $items = $items->{$scope}();
        }

        $items->get()->filter->url->map(function ($model) {
            $this->progress->start();

            $seo = $model->seoScore();

            $this->failed += count($seo->getFailedChecks());
            $this->success += count($seo->getSuccessfulChecks());
            $this->modelCount++;

            if (config('seo.database.save')) {
                $this->saveScoreToDatabase(seo: $seo, url: $model->url, model: $model);
            }

            $this->progress->finish();

            if ($this->failed === 0 && $this->success === 0) {
                $this->line('<fg=red>✘ Unfortunately, the url that is used is not correct. Please try again with a different url.</>');

                return self::FAILURE;
            }

            $this->logResultToConsole(seo: $seo, url: $model->url);
        });
    }

    private function saveScoreToDatabase(SeoScore $seo, string $url, ?object $model = null): void
    {
        $score = $seo->getScore();

        // Get the failed checks of each score so we can store them in the scan table.
        $failedChecks = $seo->getFailedChecks()->map(function ($check) {
            return get_class($check);
        })->toArray();

        $this->failedChecks = array_unique(array_merge($this->failedChecks, array_values($failedChecks)));

        DB::table('seo_scores')
            ->insert([
                'seo_scan_id' => $this->scan->id,
                'url' => $url,
                'model_type' => $model ? $model->getMorphClass() : null,
                'model_id' => $model ? $model->id : null,
                'score' => $score,
                'checks' => json_encode([
                    'failed' => $seo->getFailedChecks(),
                    'successful' => $seo->getSuccessfulChecks(),
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    private function logResultToConsole(SeoScore $seo, string $url): void
    {
        $this->line('');
        $this->line('');
        $this->line('-----------------------------------------------------------------------------------------------------------------------------------');
        $this->line('> '.$url.' | <fg=green>'.$seo->getSuccessfulChecks()->count().' passed</> <fg=red>'.($seo->getFailedChecks()->count().' failed</>'));
        $this->line('-----------------------------------------------------------------------------------------------------------------------------------');
        $this->line('');

        $seo->getAllChecks()->each(function ($checks, $type) {
            $checks->each(function ($check) use ($type) {
                if ($type == 'failed') {
                    $this->line('<fg=red>✘ '.$check->title.' failed.</>');

                    if (property_exists($check, 'failureReason')) {
                        $this->line($check->failureReason.' Estimated time to fix: '.$check->timeToFix.' minute(s).');

                        $this->line('');
                    }
                } else {
                    $this->line('<fg=green>✔ '.$check->title.'</>');
                }
            });

            $this->line('');
        });
    }
}
