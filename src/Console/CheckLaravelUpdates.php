<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Illuminate\Console\Command;
use Packagist\Api\Client as PackagistClient;
use Skydiver\LaravelCheckUpdates\Version;

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

        $client = new PackagistClient();
        $package = $client->get('laravel/framework');

        $versions = collect($package->getVersions())->map(function ($version) {
            return $version->getVersion();
        })->toArray();

        $current = app()->version();
        $latest = Version::latest($versions);

        $headers = ['Installed Version', 'Latest Version'];

        $current = version_compare($current, $latest, '<') ?
            $current = sprintf('<fg=white;bg=red>%s<fg=default>', $current) :
            $current;

        $this->table($headers, [
            [$current, $latest]
        ]);
    }
}
