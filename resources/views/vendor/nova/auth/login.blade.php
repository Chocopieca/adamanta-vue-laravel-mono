@extends('nova::auth.layout')

@section('content')

<form
    class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
    method="POST"
    action="{{ route('nova.login') }}"
>
    {{ csrf_field() }}

    <h2 class="text-2xl text-center font-normal mb-6 text-90">{{ \Laravel\Nova\Nova::name() }} Admin</h2>
    <svg class="block mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" width="100" height="2" viewBox="0 0 100 2">
        <path fill="#D8E3EC" d="M0 0h100v2H0z"/>
    </svg>


@if ($errors->any())
    <p class="text-center font-semibold text-danger my-3">
        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @else
            {{ $errors->first('password') }}
        @endif
        </p>
    @endif

    <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="email">{{ __('Email Address') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="mb-6 {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="password">{{ __('Password') }}</label>
        <input class="form-control form-input form-input-bordered w-full" id="password" type="password" name="password" required>
    </div>

    <div class="flex mb-6">
        <label class="flex items-center block text-xl font-bold">
            <input class="" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="text-base ml-2">{{ __('Remember Me') }}</span>
        </label>


        @if (\Laravel\Nova\Nova::resetsPasswords())
        <div class="ml-auto">
            <a class="text-primary dim font-bold no-underline" href="{{ route('nova.password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
        @endif
    </div>

    <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
        {{ __('Login') }}
    </button>
</form>
@endsection
