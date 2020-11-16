<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Repositories\Eloquent\UsersRepository;
use App\Notifications\Auth\ResetPassword;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke(ResetPasswordRequest $request, UsersRepository $repository)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $user->notify((new ResetPassword())->locale(app()->getLocale()));
        } else {
            return response()->error(trans('auth.check_false_email'));
        }
    }
}
