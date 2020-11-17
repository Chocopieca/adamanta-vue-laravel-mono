<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseApiRequest;

class RecoveryPasswordUpdateRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'password'=> 'required|max:40|min:3',
        ];
    }
}
