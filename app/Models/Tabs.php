<?php

namespace App\Models;

class Tabs extends BaseModel
{
    protected $fillable = [
        'id',
        'parent_id',
        'icon',
        'active',
        'position',
        'order',
        'verify'
    ];
}
