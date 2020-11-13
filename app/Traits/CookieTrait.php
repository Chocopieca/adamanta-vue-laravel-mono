<?php

namespace App\Traits;

trait CookieTrait
{
    public static function idList($name, $id, $expSec = 2592000, $count = 30)
    {
        $recentlyWatched = isset($_COOKIE[$name]) ? json_decode($_COOKIE[$name]) : [];

        if(!in_array($id, $recentlyWatched)) {
            if(count($recentlyWatched) >= $count) {
                array_pop($recentlyWatched);
            }
            array_unshift($recentlyWatched, $id);

            setcookie($name, json_encode($recentlyWatched), time() + $expSec, '/');
        }

        return $recentlyWatched;
    }

    public static function getList($name)
    {
        return isset($_COOKIE[$name]) ? json_decode($_COOKIE[$name]) : [];
    }
}
