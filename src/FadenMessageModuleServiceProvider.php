<?php

namespace Faden\FadenMessageModule;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class FadenMessageModuleServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'faden');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'faden');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if (Schema::hasTable('users')){
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }


        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.


        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/faden-message-module.php', 'faden-message-module');

        // Register the service the package provides.
        $this->app->singleton('faden-message-module', function ($app) {
            return new FadenMessageModule;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fadenmessagemodule'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/faden-message-module.php' => config_path('faden-message-module.php'),
        ], 'faden-message-module.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/faden'),
        ], 'fadenmessagemodule.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/faden'),
        ], 'fadenmessagemodule.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/faden'),
        ], 'fadenmessagemodule.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
