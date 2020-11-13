<?php

namespace App\Nova\Traits;

use Laravel\Nova\Fields\DateTime;

trait Dates
{
    public function showUpdatedAt($format = 'date_time')
    {
        return DateTime::make('Updated', 'updated_at')
            ->format(config()->get('app.moment_formats.' . $format))
            ->hideWhenCreating()
            ->hideWhenUpdating()
            ->hideFromIndex();
    }

    public function showCreatedAt($format = 'date_time')
    {
        return DateTime::make('Created', 'created_at')
            ->format(config()->get('app.moment_formats.' . $format))
            ->sortable()
            ->hideWhenCreating()
            ->hideWhenUpdating();
    }

}
