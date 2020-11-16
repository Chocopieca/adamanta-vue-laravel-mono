<?php

namespace App\Http\Controllers\Localization;

class GetController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        $in = [
            'auth.php',
            'boxes.php',
            'labels.php'
        ];
        $path = resource_path('lang/' . config('app.locale'));
        $path = is_dir($path) ? $path : resource_path('lang/en');

        $files = scandir($path);
        unset($files[0], $files[1]);

        $strings = [];
        foreach ($files as $file) {
            if(in_array($file, $in)) {
                $name = basename($file, '.php');
                $strings[$name] = require $path.'/'.$file;
            }
        }

        return $strings;
    }
}
