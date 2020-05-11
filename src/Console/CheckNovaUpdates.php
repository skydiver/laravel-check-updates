<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Illuminate\Console\Command;
use Laravel\Nova\Nova;
use PHPHtmlParser\Dom;

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

        $dom = new Dom;
        $dom->loadFromUrl('https://nova.laravel.com/releases');
        $url = $dom->find('.list-reset li')[0]->find('a')[0]->getAttribute('href');
        $url_array = explode('/', $url);
        $latest = end($url_array);

        $current = Nova::version();
        $headers = ['Installed Version', 'Latest Version'];

        $current = version_compare($current, $latest, '<') ?
            $current = sprintf('<fg=white;bg=red>%s<fg=default>', $current) :
            $current;

        $this->table($headers, [
            [$current, $latest]
        ]);
    }
}
