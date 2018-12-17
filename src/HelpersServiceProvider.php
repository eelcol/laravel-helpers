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

        $this->app->booted(function () {
            $this->routes();
        });

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        //Route::middleware(['nova', Authorize::class])
        //        ->prefix('nova-vendor/nova-facebook-connect')
        //        ->group(__DIR__.'/../routes/api.php');
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
            return new \Eelcol\LaravelHelpers\Messages;
        });
    }
}
