<?php

namespace App\Models;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class PageModule extends BaseModel implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public $translations = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'module_id',
        'page_id',
        'enabled',
        'order'
    ];

    public function module()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }
}
