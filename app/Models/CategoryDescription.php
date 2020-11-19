<?php

namespace App\Models;

class CategoryDescription extends BaseModel
{
    protected $fillable = [
        'genre_id',
        'language_id',
        'name',
        'description',
        'small_description',
        'meta_description',
        'meta_keywords',
        'meta_title'
    ];
}
