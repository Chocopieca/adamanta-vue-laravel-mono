<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $translations = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'slug_id', 'created_at', 'updated_at'
    ];

    public function localDescription()
    {
        return $this->hasOne(PageDescription::class, 'page_id', 'id')
            ->where('language_id', '=', config()->get('current_language_id'));
    }

    public function sluge()
    {
        return $this->hasOne(Slug::class, 'id', 'slug_id');
    }

    public function pageModules()
    {
        return $this->hasMany(
            PageModule::class,
            'page_id',
            'id'
        );
    }

    public function languages()
    {
        return $this->hasMany(PageDescription::class)
            ->select('page_descriptions.page_id', 'l.code')
            ->leftJoin('languages as l', 'l.id', '=', 'page_descriptions.language_id');
    }
}
