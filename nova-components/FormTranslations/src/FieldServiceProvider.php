<?php

namespace CustomComponent\FormTranslations;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class FieldServiceProvider extends ServiceProvider
{
    use Translations;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('form-translations', __DIR__.'/../dist/js/field.js');
            Nova::style('form-translations', __DIR__.'/../dist/css/field.css');

            // Save descriptions via request
            if ($translations = $event->request->get('translations')) {
                $translations = json_decode($translations, true);

                $data = $translations['data'];
                $options = $translations['options'];

                Event::listen(
                    'eloquent.saved: App\Models\\' . $options['model'],
                    function($model) use($data, $options) {
                        $this->applyTranslations($data, $options, $model);
                    }
                );
            }
        });
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
