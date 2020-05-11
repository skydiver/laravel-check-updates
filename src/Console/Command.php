<?php

namespace Skydiver\LaravelCheckUpdates\Console;

use Illuminate\Console\Command as ConsoleCommand;

class Command extends ConsoleCommand
{
    public function drawSimpleTable(string $current, string $latest)
    {
        $headers = ['Installed Version', 'Latest Version'];

        $current = version_compare($current, $latest, '<') ?
            $current = sprintf('<fg=white;bg=red>%s<fg=default>', $current) :
            $current;

        $this->table($headers, [
            [$current, $latest]
        ]);
    }
}
