<?php

namespace Eelcol\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
        * Include helpers
        */
        include_once __DIR__ . "/helpers.php";

        /**
        * Set views dir
        */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-helpers');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
        * Register singleton: helpers
        */
        $this->app->singleton('Messages', function ($app) {
            return new \Eelcol\LaravelHelpers\Classes\Messages;
        });
    }
}
