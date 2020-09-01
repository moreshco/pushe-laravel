<?php

namespace Moreshco\PusheLaravel;

use Illuminate\Auth\Console\PusheInstallCommand;
use Illuminate\Support\ServiceProvider;

class PusheLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pushe-laravel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'pushe-laravel');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('pushe.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/migrations/' => base_path('/database/migrations')
            ], 'migrations');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/pushe-laravel'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/pushe-laravel'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/pushe-laravel'),
            ], 'lang');*/

            $this->commands([
                PusheInstallCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'pushe-laravel');

        // Register the main class to use with the facade
        $this->app->singleton('pushe-laravel', function () {
            return new PusheLaravel;
        });
    }
}
