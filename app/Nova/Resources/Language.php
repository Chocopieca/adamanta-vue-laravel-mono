<?php

namespace App\Nova\Resources;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;

class Language extends Resource
{
    public static $defaultSort = ['id', 'asc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Language';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'title', 'code'
    ];

    public static function label()
    {
        return 'Языки';
    }

    public static function singularLabel()
    {
        return 'Язык';
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
            Text::make('Название', 'name')
                ->rules('required', 'max:20')
                ->sortable(),
            Text::make('Лейбл', 'title')
                ->rules('required', 'max:20')
                ->sortable(),
            Text::make('Код', 'code')
                ->rules('required', 'max:4')
                ->sortable(),
            Text::make('ISO Код', 'iso_code')
                ->rules('required', 'max:6')
                ->sortable(),
            Boolean::make('По умолчанию', 'is_default'),
            Boolean::make('Активен', 'active'),
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
        return [
            new \App\Nova\Filters\Active,
        ];
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
