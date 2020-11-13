<?php

namespace App\Nova\Traits;

trait Image
{
    public function customImage($label, $name, $dir, $fit = false)
    {
        return \Laravel\Nova\Fields\Image::make($label, $name)
            ->store(function () use ($name, $dir, $fit) {
                $fileLarge = 'images/' . $dir . '/' . time() . '.JPEG';

                $img = \Image::make(request()->file($name)->getRealPath());

                if($fit) {
                    $img->fit($fit[0], $fit[1], function ($c) {
                        $c->upsize();
                    });
                }
                $img->save(storage_path('app/public/' . $fileLarge), 75);

                return [$name => $fileLarge];
            })
            ->prunable();
    }

}