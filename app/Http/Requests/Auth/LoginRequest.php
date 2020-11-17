<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseApiRequest;

class LoginRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'email'=> 'required|email:rfc,filter|max:100|exists:users,email',
            'password'=> 'required|max:40|min:3',
//            'remember' => 'boolean'
        ];
    }
}
