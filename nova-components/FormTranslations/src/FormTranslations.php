<?php

namespace CustomComponent\FormTranslations;

use Laravel\Nova\Fields\Field;

class FormTranslations extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'form-translations';

    /**
     * @param $data
     * @return FormTranslations
     */
    public static function init($data)
    {
        $languages = \DB::table('languages')->get();

        $fields = [];
        foreach ($languages as $lang) {
            $transFields = $data['fields'];

            $description = \DB::table($data['table'])->where([
                'language_id' => $lang->id,
                $data['related_id'] => $data['id']
            ])->first();

            if ($description) {
                $transFields = [];
                foreach ($data['fields'] as $key => $langField) {
                    $clone = clone $langField;
                    $clone->value = $description->{$langField->attribute};
                    $transFields[] = $clone;
                }
            } else {
                $transFields = [];
                foreach ($data['fields'] as $key => $langField) {
                    $clone = clone $langField;
                    $clone->value = '';
                    $transFields[] = $clone;
                }
            }

            $fields[] = [
                'lang' => $lang,
                'fields' => $transFields
            ];
        }

        return self::make('translations')
            ->withMeta([
                'title' => $data['label'],
                'trans' => $fields,
                'options' => [
                    'where' => [$data['related_id'], 'language_id'],
                    'table' => $data['table'],
                    'model' => $data['model']
                ]
            ])
            ->hideFromIndex();
    }
}
