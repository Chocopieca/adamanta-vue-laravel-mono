<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $translations = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'slug', 'image', 'availability', 'active', 'creator_id', 'created_at', 'updated_at'
    ];

    public function localDescription()
    {
        return $this->hasOne(ProductDescription::class, 'product_id', 'id')
            ->where('language_id', '=', config()->get('current_language_id'));
    }

    public function languages()
    {
        return $this->hasMany(PageDescription::class)
            ->select('product_descriptions.page_id', 'l.code')
            ->leftJoin('languages as l', 'l.id', '=', 'page_descriptions.language_id');
    }
}
