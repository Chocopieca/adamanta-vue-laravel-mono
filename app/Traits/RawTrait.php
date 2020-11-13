<?php

namespace App\Traits;

trait RawTrait
{
    protected static function currentTimestamp()
    {
        return \DB::raw('CURRENT_TIMESTAMP');
    }

    protected static function onUpdateTimestamp()
    {
        return \DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    protected static function getDate($column, $format = '%d%.%m.%Y')
    {
        $as = explode('.', $column);

        return \DB::raw('DATE_FORMAT('.$column.', "'.$format.'") as '.array_pop($as));
    }

    protected static function getDateAndTime($column)
    {
        $as = explode('.', $column);

        return \DB::raw('DATE_FORMAT('.$column.', "%d%.%m.%Y %H:%i") as '.array_pop($as));
    }
}
