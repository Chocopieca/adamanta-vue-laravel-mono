<?php

namespace App\Models;

class PageTypes extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'key'
    ];

    public static function getTypes()
    {
        $types = [];

        foreach (self::get() as $type) {
            $types[$type->id] = $type->name;
        }

        return $types;
    }
}
