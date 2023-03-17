<?php

namespace Justcrm\Crm\Providers;

use Illuminate\Support\ServiceProvider;

class JustCrmProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/justcrm.php', 'justcrm'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishes([
            __DIR__.'/../config/justcrm.php' => config_path('justcrm.php'),
        ], ['laravel-assets']);
    }
}
