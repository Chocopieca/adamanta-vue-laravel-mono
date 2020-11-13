<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Ampeco\Filters\DateRangeFilter;

class CreatedAt extends DateRangeFilter
{
    public $name = 'Created At';

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
        return $query->where('created_at', '<=', $value[1] . ' 23:59')
            ->where('created_at', '>=', $value[0] . ' 00:00');
    }
}
