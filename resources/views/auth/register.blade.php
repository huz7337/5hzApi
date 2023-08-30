@extends('auth.layout')
@section('title', 'Create An Account')
@section('content')

<div class="container">
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-user"
                                                   id="name"
                                                   name="name"
                                                   placeholder="Name">
                                        </div>

                                    <div class="mb-3">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Email"
                                               name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   placeholder="Password"
                                                   name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="Confirm Password" name="password_confirmation" required
                                                   autocomplete="new-password">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block text-white w-100">
                                        {{ __('Register') }}
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
