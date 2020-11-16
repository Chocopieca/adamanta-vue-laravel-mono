<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Repositories\Eloquent\UsersRepository;
use App\Notifications\Auth\SuccessRegistration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/cabinet';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke(RegistrationRequest $request, UsersRepository $repository)
    {
        $user = $repository->createUser($request->all());

        $user->notify((new SuccessRegistration($user, $user->unhash_password))->locale(app()->getLocale()));

        return response()->success($user);
    }
}
