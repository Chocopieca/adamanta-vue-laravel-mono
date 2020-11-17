<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseApiRequest;

class ResetPasswordRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'email'=> 'required|email:rfc,filter|max:100|exists:users,email',
        ];
    }
}
