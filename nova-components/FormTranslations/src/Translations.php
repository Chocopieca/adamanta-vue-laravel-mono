<?php

namespace CustomComponent\FormTranslations;

trait Translations
{
    use InsertOnDuplicateKeyTrait;

    public function applyTranslations($data, $options, $model)
    {
        foreach ($data as $key => $val) {
            $data[$key][$options['where'][0]] = $model->id;
        }

        InsertOnDuplicateKeyTrait::insertOnDuplicateKey($options['table'], $data, [], $options['where']);
    }
}
