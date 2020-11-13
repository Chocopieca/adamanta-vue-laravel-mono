<?php

namespace CustomComponent\FormTranslations;

class FormTranslationObserver
{
    use InsertOnDuplicateKeyTrait;

    protected static $data;

    public function __construct($data = [])
    {
        if (!empty($data)) {
            self::$data = $data;
        }
    }

    /**
     * Handle the Entitu "updated" event.
     *
     * @return void
     */
    public function saved()
    {
        dd(new self::$data['model']);

        if (isset(self::$data['model']->translations)) {
            $trans = json_decode(self::$data['model']->translations, true);
            foreach ($trans as $key => $val) {
                $trans[$key][self::$data['where'][0]] = self::$data['model']->id;
            }

            InsertOnDuplicateKeyTrait::insertOnDuplicateKey(self::$data['table'], $trans, [], self::$data['where']);
        }
    }
}
