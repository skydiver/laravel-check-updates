<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Laravel\Nova\Nova;
use Skydiver\LaravelCheckUpdates\Services\NovaUpdates;

class CheckNovaUpdates extends Command
{
    protected $signature = 'updates:nova';
    protected $description = 'Check for Laravel Nova updates';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $installed = class_exists('Nova');

        if (empty($installed)) {
            $this->warn('Laravel Nova is not installed');
            return false;
        }

        $this->info('Checking latest Nova version ...');

        $current = Nova::version();
        $latest = NovaUpdates::getLatest();

        $this->drawSimpleTable($current, $latest);
    }
}
