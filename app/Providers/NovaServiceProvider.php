<?php

namespace App\Providers;

use App\Models\Language;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;

class NovaServiceProvider extends \Laravel\Nova\NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if(!app()->runningInConsole()) {
//            $this->app->alias(
//                \App\Http\Controllers\Nova\LoginController::class,
//                \Laravel\Nova\Http\Controllers\LoginController::class
//            );

            $languages = Language::get();

            config(['nova-menu.locales' => $languages->pluck('name', 'code')->toArray()]);

            Nova::serving(function () use ($languages) {
                app()->setLocale('ru');

                // Load observers
                Language::observe(\App\Observers\Nova\LanguageObserver::class);
                \App\Models\Product::observe(\App\Observers\Nova\ProductObserver::class);

                Nova::provideToScript([
                    'languages' => $languages,
                    'sidebar' => \App\Repositories\Eloquent\TabsRepository::getMenu()
                ]);

                Nova::script('admin', base_path('public/js/admin.js'));
            });

            Gate::guessPolicyNamesUsing(function ($modelClass) {
                return 'App\\Policies\\NovaPolicy';
            });
        }
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the application's Nova resources.
     *
     * @return void
     */
    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova/Resources'));
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new \App\Nova\Metrics\Users\NewUsers,
            new \App\Nova\Metrics\Users\UsersPerDay,
            new \App\Nova\Metrics\Users\UsersPerStatus,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \CustomComponent\AccessControl\AccessControl,
            \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),
            \Bakerkretzmar\NovaSettingsTool\SettingsTool::make(),
            new \OptimistDigital\MenuBuilder\MenuBuilder,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
