<?php

namespace App\Models;

class Action extends BaseModel
{
    protected $fillable = [
        'id',
        'tab_id',
        'title',
        'key'
    ];
}
