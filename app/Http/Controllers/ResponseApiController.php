<?php

namespace App\Http\Controllers;

class ResponseApiController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    public function Autorise($user, $method)
    {
    	$user->method = $method;
    	$this->authorize('checkPermission', $user);
    }
}
