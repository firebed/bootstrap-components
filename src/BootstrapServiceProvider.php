<?php

namespace Firebed\Components;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'bs');

        $this->mergeConfigFrom(__DIR__ . '/config/intl.php', 'intl');

        $this->publishes([__DIR__ . '/config/intl.php' => config_path('intl.php')]);
    }
}