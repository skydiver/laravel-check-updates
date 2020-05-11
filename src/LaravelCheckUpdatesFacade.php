<?php

namespace Skydiver\LaravelCheckUpdates;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Skydiver\LaravelCheckUpdates\Skeleton\SkeletonClass
 */
class LaravelCheckUpdatesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-check-updates';
    }
}
