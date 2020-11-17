<?php

namespace App\Models;

class PageModuleSubPage extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'page_module_id',
        'sub_page_module_id'
    ];
}
