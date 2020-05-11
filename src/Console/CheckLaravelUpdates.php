<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Skydiver\LaravelCheckUpdates\Services\LaravelUpdates;

class CheckLaravelUpdates extends Command
{
    protected $signature = 'updates:laravel';
    protected $description = 'Check for Laravel updates';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Checking latest Laravel version ...');

        $current = app()->version();
        $latest = LaravelUpdates::getLatest();

        $this->drawSimpleTable($current, $latest);
    }
}
