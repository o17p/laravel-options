<?php

namespace O17p\Options;

use Illuminate\Support\ServiceProvider;

class OptionsServiceProvider extends ServiceProvider {
    public function register(): void {
        // Bindings if needed
    }

    public function boot(): void {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\SetOptionCommand::class,
                Commands\GetOptionCommand::class,
                Commands\DeleteOptionCommand::class,
                Commands\ListOptionsCommand::class,
            ]);
        }
    }
}
