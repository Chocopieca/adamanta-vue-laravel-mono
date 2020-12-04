<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUseDescription extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_use_id', 'language_id', 'description'
    ];
}
