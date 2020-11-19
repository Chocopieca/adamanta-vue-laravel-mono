<?php

namespace App\Models;

class Category extends BaseModel
{
    public $slug_generate = '';
    public $translations = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'creator_id', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function localDescription()
    {
        return $this->hasOne(CategoryDescription::class, 'category_id', 'id')
            ->where('language_id', '=', config()->get('current_language_id'));
    }

    public function parentLocalDescription()
    {
        return $this->hasOne(CategoryDescription::class, 'category_id', 'parent_id')
            ->where('language_id', '=', config()->get('category_language_id'));
    }

    public static function groups($key = 'id', $val = 'name')
    {
        return self::select('categories.id', 'gd.name')
            ->leftJoin('category_descriptions as gd', function ($query) {
                $query->on('gd.category_id', '=', 'categories.id')
                    ->where('gd.language_id', '=', config()->get('current_language_id'));
            })
            ->get()
            ->mapWithKeys(function ($item) use ($key, $val) {
                return [$item[$key] => $item[$val]];
            })->all();
    }

    public static function parentsSelect($key = 'id', $val = 'name')
    {
        return self::select('categories.id', 'cd.name')
            ->leftJoin('category_descriptions as cd', function ($query) {
                $query->on('cd.category_id', '=', 'categories.id')
                    ->where('cd.language_id', '=', config()->get('current_language_id'));
            })
            ->where('parent_id', 0)
            ->get()
            ->mapWithKeys(function ($item) use ($key, $val) {
                return [$item[$key] => $item[$val]];
            })->all();
    }

    public function getLocalNameAttribute()
    {
        return isset($this->localDescription->name) ? $this->localDescription->name : '---';
    }

    public function getParentLocalNameAttribute()
    {
        return isset($this->parentLocalDescription->name) ? $this->parentLocalDescription->name : '---';
    }

    public function setParentIdAttribute($val)
    {
        return is_null($val) ? 0 : $val;
    }

    public function languages()
    {
        return $this->hasMany(CategoryDescription::class)
            ->select('categories_descriptions.category_id', 'l.code')
            ->leftJoin('languages as l', 'l.id', '=', 'category_descriptions.language_id');
    }
}
