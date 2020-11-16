<?php

namespace App\Http\Controllers\Auth;

use App\Models\OauthAccessToken;

class LogoutController extends \App\Http\Controllers\ResponseApiController
{
    public function __invoke()
    {
        $id = auth('api')->id();

        if ($id) {
            return OauthAccessToken::where('user_id', $id)->delete();
        }
    }
}
