<?php

namespace O17p\Options\Commands;

use Illuminate\Console\Command;
use O17p\Options\Repositories\OptionsRepository;

class GetOptionCommand extends Command {
    protected $signature = 'options:get {key} {field}';
    protected $description = 'Get a field value from the options table';

    public function handle() {
        $key = $this->argument('key');
        $field = $this->argument('field');

        $data = app(OptionsRepository::class)->get($key);

        if (!array_key_exists($field, $data)) {
            $this->error("Field '{$field}' not found for key '{$key}'.");
            return;
        }

        $this->info($data[$field]);
    }
}
