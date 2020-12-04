<?php

namespace App\Nova\Resources;

use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Benjaminhirsch\NovaSlugField\Slug;
use Laravel\Nova\Fields\Text;
use CustomComponent\FormTranslations\FormTranslations;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Boolean;
use App\Nova\Traits\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use R64\NovaFields\Row;
use R64\NovaFields\Text as CustomText;
use R64\NovaFields\Select as CustomSelect;
use R64\NovaFields\Boolean as CustomBoolean;

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

    public static function indexQuery(NovaRequest $request, $query)
    {
        $query = parent::indexQuery($request, $query);

        return $query->with('prices');
    }

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
        $uses = [
            $this->customImage('Изображение', 'image', 'product_uses', false, true)
                ->rules('mimes:png,jpeg,jpg', 'max:2048')
                ->fieldClasses('w-full px-8 py-6')
                ->hideLabelInForms(),
        ];

        foreach (\App\Models\Language::get() as $lang) {
            array_push($uses,
                CustomText::make('Описание ' . $lang->code, 'description_' . $lang->id)
                    ->fieldClasses('w-full px-8 py-6')
                    ->hideLabelInForms(),
            );
        }

        return [
            ID::make()->sortable(),
            Text::make('Название', function () {
                return isset($this->localDescription->title) ? $this->localDescription->title : '---';
            })->onlyOnIndex(),

            Slug::make('SEO-url', 'slug')
                ->rules('required', 'max:60'),

            TextWithSlug::make('Название для SEO-url', 'slug_generate')
                ->help('Поле для автогенерации SEO-url.')
                ->slug('slug')
                ->hideFromIndex()
                ->hideFromDetail(),

            Select::make('Категория', 'category_id')
                ->rules('required')
                ->options(\App\Models\Category::parentsSelect())
                ->hideFromIndex(),

            $this->customImage('Изображение', 'image', 'products')
                ->rules('mimes:png,jpeg,jpg', 'max:2048'),

            Boolean::make('Активный', 'active'),
            Boolean::make('В наличии', 'availability'),

            Heading::make(__('admin.labels.description')),

            FormTranslations::init([
                'id' => $this->id,
                'model' => 'Product',
                'related_id' => 'product_id',
                'table' => 'product_descriptions',
                'label' => '',
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

            Heading::make('Фасовки'),

            Row::make('', [
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
                CustomBoolean::make('Активный', 'active')
                    ->fieldClasses('w-full px-8 py-6')
                    ->hideLabelInForms(),

            ], 'prices')
                ->addRowText('Добавить')
                ->fieldClasses('w-full px-8 py-6')
                ->labelClasses('px-8 py-6'),

            Heading::make('Использование'),

            Row::make('', $uses, 'uses')
                ->addRowText('Добавить')
                ->fieldClasses('w-full px-8 py-6')
                ->labelClasses('px-8 py-6'),

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
