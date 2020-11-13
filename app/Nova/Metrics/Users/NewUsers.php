<?php

namespace App\Nova\Metrics\Users;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Value;
use App\Models\User;

class NewUsers extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, User::class);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            5 => 'За 5 days',
            10 => 'За 10 days',
            30 => 'За 30 days',
            'MTD' => 'One month before the current date',
            'QTD' => 'One quarter before the current date',
            'YTD' => 'One year before the current date',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'new-users';
    }
}
