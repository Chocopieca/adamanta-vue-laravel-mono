<?php

namespace App\Models;

class UnitSaleDescription extends BaseModel
{
    protected $fillable = [
        'id', 'unit_sale_id', 'language_id', 'name'
    ];
}
