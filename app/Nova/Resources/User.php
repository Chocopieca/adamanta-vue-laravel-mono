<?php

namespace App\Nova\Resources;

use Bissolli\NovaPhoneField\PhoneNumber;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

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
        'id', 'name', 'email',
    ];

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

            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'max:100'),

//            Text::make('Nickname', 'nickname')
//                ->sortable()
//                ->rules('required', 'max:100'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:100')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            PhoneNumber::make('Phone', 'phone')
                ->withCustomFormats('+38-###-###-####')
                ->sortable(),

            Text::make('Role', function () {
                return $this->parent_id > 0 ? 'Parent' : 'Child';
            })->onlyOnIndex(),

            Password::make('Password', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Boolean::make('Active', 'active')->sortable(),

            $this->showCreatedAt(),
            $this->showUpdatedAt(),
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
            new \App\Nova\Filters\Admin\Role,
            new \App\Nova\Filters\Active,
            new \App\Nova\Filters\CreatedAt,
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
