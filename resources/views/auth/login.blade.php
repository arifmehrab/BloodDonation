@extends('layouts.app')
@section('title', 'Blood | Login')
@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div><!-- row md -->
        <div class="col-md-6">
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <h3 class="text-center text-info">Login</h3>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Email:</label><br>
                                        <input type="email" id="username" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me"  name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}></span></label><br><br>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        <!-- Forget Password --->
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                    <div id="register-link" class="text-right">
                                        <a href="{{ url('/register') }}" class="text-info">Register here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- login -->
        </div><!-- End col 6 -->
        <div class="col-md-3"></div>
    </div>
</div>
<br><br>
@endsection
