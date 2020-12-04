<?php

namespace App\Nova\Resources;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use CustomComponent\FormTranslations\FormTranslations;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Boolean;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use App\Nova\Traits\Image;
use Laravel\Nova\Fields\Heading;

class Category extends Resource
{
    use Image;

    public static $defaultSort = ['created_at', 'desc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Category';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'local_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'slug',
    ];

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'localDescription' => ['name'],
    ];

    public static function label()
    {
        return 'Категории';
    }

    public static function singularLabel()
    {
        return 'Категорию';
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
            Text::make('Название', 'local_name')->exceptOnForms(),
            Text::make('Родительская', 'parent_local_name')->exceptOnForms(),

            Slug::make('SEO-url', 'slug')->rules('required', 'max:60'),
            TextWithSlug::make('Название для SEO-url', 'slug_generate')
                ->help('Поле для автогенерации SEO-url.')
                ->slug('slug')
                ->hideFromIndex()
                ->hideFromDetail(),

            $this->customImage('Изображение', 'image', 'categories')
                ->rules('mimes:png,jpeg,jpg', 'max:2048'),

            Select::make('Родительская категория', 'parent_id')
                ->options(\App\Models\Category::parentsSelect())
                ->hideFromIndex(),

            Boolean::make('Активный', 'active')->sortable(),

            Heading::make(__('admin.labels.description')),

            FormTranslations::init([
                'id' => $this->id,
                'model' => 'Category',
                'related_id' => 'category_id',
                'table' => 'category_descriptions',
                'label' => '',
                'fields' =>  [
                    Text::make('Название', 'name')
                        ->rules('required', 'max:60'),
                    Text::make('Meta Описание', 'meta_description')
                        ->rules('required', 'max:300'),
                    Text::make('Meta Ключевые слова', 'meta_keywords')
                        ->rules('required', 'max:240'),
                    Text::make('Meta Заголовок', 'meta_title')
                        ->rules('required', 'max:100'),
                    NovaTinyMCE::make('Описание', 'description')
                        ->options(config()->get('nova.tinimce_options')),
                ]
            ])->onlyOnForms(),
            $this->showCreatedAt(),
            $this->showUpdatedAt()
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
//            new \App\Nova\Filters\Genre\ParentGenres,
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
//    public function actions(Request $request)
//    {
//        return [
//            new \App\Nova\Actions\Active
//        ];
//    }
}
