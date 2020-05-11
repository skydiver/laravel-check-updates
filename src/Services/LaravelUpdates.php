<?php

namespace Skydiver\LaravelCheckUpdates\Services;

use Packagist\Api\Client as PackagistClient;
use Skydiver\LaravelCheckUpdates\Version;

class LaravelUpdates
{
    public static function getLatest() :string
    {
        $client = new PackagistClient();
        $package = $client->get('laravel/framework');

        $versions = collect($package->getVersions())->map(function ($version) {
            return $version->getVersion();
        })->toArray();

        return Version::latest($versions);
    }
}
