<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Illuminate\Console\Command;
use Packagist\Api\Client as PackagistClient;
use Skydiver\LaravelCheckUpdates\Version;

class CheckUpdates extends Command
{
    protected $signature = 'updates:laravel';
    protected $description = 'Check for Laravel updates';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $client = new PackagistClient();
        $package = $client->get('laravel/framework');

        $versions = collect($package->getVersions())->map(function ($version) {
            return $version->getVersion();
        })->toArray();

        $current = app()->version();
        $latest = Version::latest($versions);

        $headers = ['Installed Version', 'Latest Version'];

        $this->table($headers, [
            [$current, $latest]
        ]);
    }
}
