<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseApiRequest;

class RegistrationRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email:rfc,filter|max:100|unique:users',
            'password'=> 'required|max:40|min:3',
        ];
    }
}
