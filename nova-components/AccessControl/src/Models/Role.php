<?php

namespace CustomComponent\AccessControl\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public static function getRoles()
    {
        return self::where('access_admin', 1)->get();
    }
}
