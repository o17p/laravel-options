<?php

namespace O17p\Options\Commands;

use Illuminate\Console\Command;
use O17p\Options\Repositories\OptionsRepository;

class DeleteOptionCommand extends Command
{
    protected $signature = 'options:delete {key} {field}';
    protected $description = 'Delete a field from the options table';

    public function handle()
    {
        $key = $this->argument('key');
        $field = $this->argument('field');

        $repo = app(OptionsRepository::class);
        $data = $repo->get($key);

        if (!array_key_exists($field, $data)) {
            $this->warn("Field '{$field}' not found for key '{$key}'.");
            return;
        }

        unset($data[$field]);
        $repo->set($key, $data);

        $this->info("Field '{$field}' deleted from key '{$key}'.");
    }
}
