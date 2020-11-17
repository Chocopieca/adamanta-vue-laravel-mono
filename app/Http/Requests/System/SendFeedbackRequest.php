<?php
namespace App\Http\Requests\System;

use App\Http\Requests\BaseApiRequest;

class SendFeedbackRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email:rfc,filter|max:100',
            'message'=> 'required|max:300',
            'recaptcha_token' => 'string|recaptcha'
        ];
    }
}
