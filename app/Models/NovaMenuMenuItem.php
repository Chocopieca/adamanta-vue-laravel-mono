<?php

namespace App\Models;

class NovaMenuMenuItem extends BaseModel
{
    protected $fillable = [
        'id',
        'menu_id',
        'name',
        'class',
        'value',
        'target',
        'parameters',
        'parent_id',
        'order',
        'enabled'
    ];
}
