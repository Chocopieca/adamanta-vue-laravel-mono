<?php

namespace App\Nova\Resources;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use CustomComponent\FormTranslations\FormTranslations;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Boolean;

class Page extends Resource
{
    public static $defaultSort = ['id', 'asc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Page';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'slug';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'slug',
    ];

    public static function label()
    {
        return 'Страницы';
    }

    public static function singularLabel()
    {
        return 'Страницу';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make(__('admin.labels.name'), function () {
                return isset($this->localDescription->title) ? $this->localDescription->title : '---';
            })->onlyOnIndex(),

            Text::make('SEO-url', 'slug')->rules('required', 'max:60')->hideFromIndex(),
            Boolean::make('Активная', 'active'),
            Boolean::make('Показать хлебные крошки', 'show_title'),
            Boolean::make('Главная', 'home'),
            Boolean::make('No Index', 'no_index'),

            FormTranslations::init([
                'id' => $this->id,
                'model' => 'Page',
                'related_id' => 'page_id',
                'table' => 'page_descriptions',
                'label' => __('admin.labels.description'),
                'fields' =>  [
                    Text::make(__('admin.labels.title'), 'title')
                        ->rules('required', 'max:60'),
                    Text::make(__('admin.labels.meta_title'), 'meta_title')
                        ->rules('required', 'max:150'),
                    Text::make(__('admin.labels.meta_description'), 'meta_description')
                        ->rules('required', 'max:300'),
                    Text::make(__('admin.labels.meta_keywords'), 'meta_keywords')
                        ->rules('required', 'max:240'),
                    NovaTinyMCE::make(__('admin.labels.content'), 'description')
                        ->options(config()->get('nova.tinimce_options')),
                ]
            ])->onlyOnForms(),

//            HasMany::make('Модули', 'pageModules', PageModules::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
