<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Illuminate\Console\Command;
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

        $headers = ['Installed Version', 'Latest Version'];

        $current = version_compare($current, $latest, '<') ?
            $current = sprintf('<fg=white;bg=red>%s<fg=default>', $current) :
            $current;

        $this->table($headers, [
            [$current, $latest]
        ]);
    }
}
