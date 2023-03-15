<?php


namespace Justcrm\Crm\Providers;

use Illuminate\Support\ServiceProvider;

class JustcrmProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'justcrm');
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }
}
