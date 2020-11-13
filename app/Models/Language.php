<?php

namespace App\Models;

class Language extends BaseModel
{
    protected $fillable = [
        'title', 'slug', 'image'
    ];

    public function makeDefault()
    {
        Language::where('is_default', '=', 1)->update(array('is_default' => 0));
        $this->is_default = 1;
        $this->save();
    }

    public static function groups($key = 'id', $val = 'title')
    {
        return self::select('languages.id', 'languages.title')
            ->get()
            ->mapWithKeys(function ($item) use ($key, $val) {
                return [$item[$key] => $item[$val]];
            })->all();
    }
}
