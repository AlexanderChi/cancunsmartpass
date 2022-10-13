@extends('layouts.app')

@section('content')

<div class="login-center" style="padding-top: 115px">
    <div class="container-login">
        <div class="">
            <div class="form login">
                <span class="title-lg">{{ __('Reset Password') }}</span>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-field">
                        <input id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                            placeholder="Enter your email">
                        <i class="uil uil-envelope icon"></i>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field button">
                        <button class="button-cmp" type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>

                    <div class="login-signup">
                        <span class="text"> Dont have an account?
                            <a href="{{ route('register') }}" class="text login-link">Register Free</a>
                        </span><br>
                        <span class="text"> You can also
                            <a href="{{ route('login') }}" class="text login-link">login</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
