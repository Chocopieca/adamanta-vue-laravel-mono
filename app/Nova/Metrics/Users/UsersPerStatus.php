<?php

namespace App\Nova\Metrics\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class UsersPerStatus extends Partition
{
    public $name = 'Пользаватели по Группе';

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, User::class, 'active')->label(function ($value) {
            return $value ? 'Active' : 'Not active';
        });
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            14 => 'За 14 days',
            30 => 'За 30 days',
            60 => 'За 60 days',
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
        return 'users-per-status';
    }
}
