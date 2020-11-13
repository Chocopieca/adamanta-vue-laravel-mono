<?php

namespace CustomComponent\AccessControl\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'telephone',
        'subscribe',
        'city',
        'patronymic',
        'password'
    ];

    public static function getUsers()
    {
        return self::select('id', 'first_name', 'last_name')->where('role_id', '!=', 9)->get();
    }
}
