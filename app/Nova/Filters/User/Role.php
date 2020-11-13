<?php

namespace App\Nova\Filters\User;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Role extends Filter
{
    public $name = 'Role';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('parent_id', ($value == 'parent' ? '>' : '='), 0);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Parent' => 'parent',
            'Child' => 'child',
        ];
    }
}
