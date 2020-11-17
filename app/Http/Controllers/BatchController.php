<?php
namespace App\Http\Controllers;

class BatchController extends ResponseApiController
{
    public function get()
    {
        return response()->json([
            'user' => \App\Repositories\Eloquent\UsersRepository::getCurrent(),
//            'settings' => \App\Models\Setting::where('group', 'site')->get()->pluck('data', 'key'),
            'trans' => (new \App\Http\Controllers\Localization\GetController)(),
            'languages' => \App\Repositories\Eloquent\LanguagesRepository::getActive(),
            'menu' =>  \App\Repositories\Eloquent\NovaMenuMenusRepository::getMenu(),
        ]);
    }
}
