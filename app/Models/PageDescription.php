<?php

namespace App\Models;

class PageDescription extends BaseModel
{
    protected $fillable = [
        'page_id',
        'language_id',
        'name',
        'description',
        'meta_h1',
        'meta_description',
        'meta_keywords',
        'meta_title'
    ];
}
