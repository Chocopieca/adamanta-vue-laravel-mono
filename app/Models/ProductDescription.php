<?php

namespace App\Models;

class ProductDescription extends BaseModel
{
    protected $fillable = [
        'product_id',
        'language_id',
        'title',
        'description',
        'meta_h1',
        'meta_description',
        'meta_keywords',
        'meta_title'
    ];
}
