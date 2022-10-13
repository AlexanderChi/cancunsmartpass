@extends('layouts.app')

@section('content')
<div class="login-center" style="padding-top: 115px">
    <div class="container-login">
        <div class="">
            <div class="form login">
                <span class="title-lg">Login</span>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-field">
                        <input id="email"
                            type="email"
                            name="email"
                            class="password @error('email') is-invalid @enderror"
                            placeholder="Enter your password"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus>
                        <i class="uil uil-envelope icon"></i>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <input id="password"
                            type="password"
                            name="password"
                            class="password @error('password') is-invalid @enderror"
                            placeholder="Enter your password"
                            required
                            autocomplete="email"
                            autofocus>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox-text ">
                        <div class="checkbox-content">
                            <input type="checkbox"
                            id="remember"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="text">{{ __('Remember Me') }}</label>
                        </div>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                    <div class="input-field button">
                        <button class="button-cmp" type="submit">{{ __('Login') }}</button><br>
                        {{-- <input type="button" value="{{ __('Login') }}"> --}}
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text"> Not a memer?
                        <a href="{{ route('register') }}" class="text signup-link">Register Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
