<?php

namespace O17p\Options\Repositories;

use O17p\Options\Models\Option;

class OptionsRepository {
    public function get(string $key): array {
        return Option::where('key', $key)->firstOrFail()->data;
    }

    /**
     * Overskriv hele datasættet for en given key.
     */
    public function set(string $key, array $fullData): void {
        $option = Option::firstOrNew(['key' => $key]);
        $option->data = $fullData;
        $option->save();
    }

    /**
     * Flet en eller flere værdier ind i eksisterende data.
     */
    public function merge(string $key, array $newValues): void {
        $option = Option::firstOrNew(['key' => $key]);
        $option->data = array_merge($option->data ?? [], $newValues);
        $option->save();
    }
}
