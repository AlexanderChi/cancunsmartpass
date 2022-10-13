@extends('layouts.app')

@section('content')
<div class="register-center">
    <div class="container-register">
		<div class="">
			<div class="form signup">
				<span class="title-lg">Regístrate y adquiere tu pase.</span>

				<form method="POST" action="{{ route('register') }}">
                    @csrf

					{{-- <div class="row"> --}}
						{{-- <div class="col"> --}}
                    <div class="input-field">
                        <input id="name"
                            type="text"
                            class=" @error('name') is-invalid @enderror"
                            name="name"
                            placeholder="Enter your name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus>
                        <i class="uil uil-user"></i>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
						{{-- </div> --}}
						{{-- <div class="col">
							<div class="input-field">
								<input id="lastname"
									type="text"
									class=" @error('name') is-invalid @enderror"
									name="lastname"
									value="{{ old('name') }}"
									required
									autocomplete="lastname"
									autofocus
									placeholder="Enter Last Name">
								<i class="uil uil-user"></i>

								@error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div> --}}
					{{-- </div> --}}
					{{-- <div class="input-field">
						<input id="phone"
									type="text"
									class=" @error('name') is-invalid @enderror"
									name="phone"
									value="{{ old('name') }}"
									required
									autocomplete="phone"
									autofocus
									placeholder="Enter phone number">
						<i class="uil uil-phone"></i>

						@error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div> --}}
					<div class="input-field">
						<input id="email"
							type="email"
							class="@error('email') is-invalid @enderror"
							name="email"
							value="{{ old('email') }}"
							required
							autocomplete="email"
							placeholder="Enter your email">
						<i class="uil uil-envelope"></i>

						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <div class="input-field">
                        <input id="password"
                            type="password"
                            class="@error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="input-field">
                        <input id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm a password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

					<div class="checkbox-text">
						<div class="checkbox-content">
							<input type="checkbox" id="LogCheck">
							<label for="logCheck" class="text">I accept termis & conditions</label>
						</div>
					</div>
					<div class="input-field button">
						<button class="button-cmp" type="submit">
                            {{ __('Siguiente') }}
                        </button>
					</div>
				</form>

				<div class="login-signup">
					<span class="text"> Already have an account?
						<a href="{{ route('login') }}" class="text login-link">Login Now</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
