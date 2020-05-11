<?php

namespace Skydiver\LaravelCheckUpdates;

use Illuminate\Support\ServiceProvider;
use Skydiver\LaravelCheckUpdates\Console\CheckLaravelUpdates;
use Skydiver\LaravelCheckUpdates\Console\CheckNovaUpdates;

class LaravelCheckUpdatesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CheckLaravelUpdates::class,
                CheckNovaUpdates::class
            ]);
        }
    }
}
