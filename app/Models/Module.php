<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'module_type_id', 'name', 'for_all', 'show_title', 'order', 'position'
    ];

    public function types()
    {
        return $this->belongsTo(ModuleTypes::class, 'module_type_id', 'id');
    }

    public static function modules()
    {
        return self::select('modules.id', 'modules.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            })->all();
    }
}
