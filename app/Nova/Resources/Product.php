<?php

namespace App\Nova\Resources;

use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use CustomComponent\FormTranslations\FormTranslations;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Boolean;
use App\Nova\Traits\Image;
use R64\NovaFields\Row;
use R64\NovaFields\Text as CustomText;
use R64\NovaFields\Select as CustomSelect;

class Product extends Resource
{
    use Image;

    public static $defaultSort = ['id', 'asc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Product';

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
        return 'Товары';
    }

    public static function singularLabel()
    {
        return 'Товар';
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
                return isset($this->localDescription->title) ? $this->localDescription->title : '---';
            })->onlyOnIndex(),

            Text::make('SEO-url', 'slug')->rules('required', 'max:60')->hideFromIndex(),
            TextWithSlug::make('Название для SEO-url', 'slug_generate')
                ->help('Поле для автогенерации SEO-url.')
                ->slug('slug')
                ->hideFromIndex()
                ->hideFromDetail(),
            $this->customImage('Изображение', 'image', 'authors')
                ->rules('mimes:png,jpeg,jpg', 'max:2048'),
            Select::make('Категория', 'category_id')
                ->options(\App\Models\Category::parentsSelect())
                ->hideFromIndex(),
            Boolean::make('Активная', 'active'),
            Boolean::make('В наличии', 'availability'),

            Row::make('Фасовки', [
                CustomText::make('Цена', 'price')
                    ->fieldClasses('w-full px-8 py-6')
                    ->hideLabelInForms(),
                CustomText::make('Вес', 'weight')
                    ->fieldClasses('w-full px-8 py-6')
                    ->hideLabelInForms(),
                CustomSelect::make('Еденица измерения', 'unit_sale_id')
                    ->options(\App\Models\UnitSale::parentsSelect())
                    ->fieldClasses('w-full px-8 py-6')
                    ->hideLabelInForms(),
            ], 'prices')
                ->addRowText('Добавить фасовку')
                ->fieldClasses('w-full px-8 py-6')
                ->labelClasses('w-1/2 px-8 py-6'),

            FormTranslations::init([
                'id' => $this->id,
                'model' => 'Product',
                'related_id' => 'product_id',
                'table' => 'product_descriptions',
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
