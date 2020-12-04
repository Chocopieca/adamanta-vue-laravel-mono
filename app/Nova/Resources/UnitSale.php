<?php

namespace App\Nova\Resources;

use CustomComponent\FormTranslations\FormTranslations;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;

class UnitSale extends Resource
{
    public static $defaultSort = ['id', 'asc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\UnitSale';

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
        'id', 'name'
    ];

    public static function label()
    {
        return 'Единицы измерения';
    }

    public static function singularLabel()
    {
        return 'Единицу измерения';
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
            Text::make('Название', function () {
                return isset($this->localDescription->name) ? $this->localDescription->name : '---';
            })->onlyOnIndex(),
            Boolean::make('Активная', 'active'),

            Heading::make(__('admin.labels.description')),

            FormTranslations::init([
                'id' => $this->id,
                'model' => 'UnitSale',
                'related_id' => 'unit_sale_id',
                'table' => 'unit_sale_descriptions',
                'label' => '',
                'fields' =>  [
                    Text::make('Название', 'name')
                        ->rules('required', 'max:10'),
                ]
            ])->onlyOnForms(),
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
