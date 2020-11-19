<?php

namespace App\Models;

class UnitSale extends BaseModel
{
    protected $fillable = [
        'id', 'active'
    ];

    public function localDescription()
    {
        return $this->hasOne(UnitSaleDescription::class, 'unit_sale_id', 'id')
            ->where('language_id', '=', config()->get('current_language_id'));
    }

    public static function parentsSelect($key = 'id', $val = 'name')
    {
        return self::select('unit_sales.id', 'ud.name')
            ->leftJoin('unit_sale_descriptions as ud', function ($query) {
                $query->on('ud.unit_sale_id', '=', 'unit_sales.id')
                    ->where('ud.language_id', '=', config()->get('current_language_id'));
            })
            ->where('unit_sales.active', 1)
            ->get()
            ->mapWithKeys(function ($item) use ($key, $val) {
                return [$item[$key] => $item[$val]];
            })->all();
    }
}
