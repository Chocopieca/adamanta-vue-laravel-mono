<?php

namespace App\Http\Controllers\Languages;

class GetActiveController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        return response()->success(
            (new \App\Repositories\Eloquent\LanguagesRepository(app()))->getActive()
        );
    }
}
