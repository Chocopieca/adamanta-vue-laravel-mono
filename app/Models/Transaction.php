<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'method',
        'payment_system',
        'status',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
