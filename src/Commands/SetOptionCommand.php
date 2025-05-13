<?php

namespace O17p\Options\Commands;

use Illuminate\Console\Command;
use O17p\Options\Repositories\OptionsRepository;

class SetOptionCommand extends Command
{
    protected $signature = 'options:set {key} {field} {value}';
    protected $description = 'Set a field in the options table';

    public function handle()
    {
        $key = $this->argument('key');
        $field = $this->argument('field');
        $value = $this->argument('value');

        // app(OptionsRepository::class)->set($key, [$field => $value]);
        app(OptionsRepository::class)->merge($key, [$field => $value]);
        $this->info("Set '{$field}' on '{$key}' to '{$value}'");
    }
}
