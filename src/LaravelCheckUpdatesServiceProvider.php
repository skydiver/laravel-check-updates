<?php

namespace Skydiver\LaravelCheckUpdates;

use Illuminate\Support\ServiceProvider;
use Skydiver\LaravelCheckUpdates\Console\CheckLaravelUpdates;

class LaravelCheckUpdatesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CheckLaravelUpdates::class
            ]);
        }
    }
}
