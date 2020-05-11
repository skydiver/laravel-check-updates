<?php

namespace Skydiver\LaravelCheckUpdates;

use Illuminate\Support\ServiceProvider;
use Skydiver\LaravelCheckUpdates\Console\CheckUpdates;

class LaravelCheckUpdatesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CheckUpdates::class
            ]);
        }
    }
}
