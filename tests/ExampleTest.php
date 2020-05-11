<?php

namespace Skydiver\LaravelCheckUpdates\Tests;

use Orchestra\Testbench\TestCase;
use Skydiver\LaravelCheckUpdates\LaravelCheckUpdatesServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelCheckUpdatesServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
