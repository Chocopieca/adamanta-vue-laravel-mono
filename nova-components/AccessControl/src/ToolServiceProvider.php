<?php

namespace CustomComponent\AccessControl;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;

class ToolServiceProvider extends AuthServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishing();
        $this->routes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'access-control');

        Nova::resources([
            \CustomComponent\AccessControl\Resources\Role::class,
        ]);

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        $this->app->booted(function () {
            if ($this->app->routesAreCached()) {
                return;
            }

            Route::group(
                [
                    'namespace' => 'CustomComponent\AccessControl\Http\Controllers',
                    'as' => 'nova-vendor.access-control.',
                    'prefix' => 'nova-vendor/access-control',
                    'middleware' => 'nova'
                ],
                function () {
                    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
                }
            );
        });
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__.'/../database/migrations' => database_path('migrations'),
//            ], 'migrations');
        }
    }
}
