<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleTypes extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'key'
    ];

    public static function getTypes()
    {
        $types = [];

        foreach (self::get() as $type) {
            $types[$type->id] = __('page-modules::module_types.' . $type['key']);
        }

        return $types;
    }
}
