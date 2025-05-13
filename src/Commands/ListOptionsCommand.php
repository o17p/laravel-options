<?php

namespace O17p\Options\Commands;

use Illuminate\Console\Command;
use O17p\Options\Repositories\OptionsRepository;

class ListOptionsCommand extends Command {
    protected $signature = 'options:list {key}';
    protected $description = 'List all fields and values for a given key in the options table';

    public function handle() {
        $key = $this->argument('key');
        $data = app(OptionsRepository::class)->get($key);

        if (empty($data)) {
            $this->warn("No values found for key '{$key}'.");
            return;
        }

        $rows = [];
        foreach ($data as $field => $value) {
            $rows[] = [$field, is_scalar($value) ? $value : json_encode($value)];
        }

        $this->table(['Field', 'Value'], $rows);
    }
}
