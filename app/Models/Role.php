<?php

namespace App\Models;

class Role extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'key',
        'title'
    ];

    public static function roles()
    {
        return self::select('roles.id', 'roles.title')->get();
    }
}
