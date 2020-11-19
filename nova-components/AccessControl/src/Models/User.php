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
        return self::select('users.id', 'users.first_name', 'users.last_name')
            ->leftJoin('roles as r', 'r.id', '=', 'users.role_id')
            ->where('r.access_admin', 1)->get();
    }
}
