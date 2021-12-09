@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="user-box">
                    <input type="email" name="email" required="">
                    <label>{{ __('E-Mail Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>{{ __('Password') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" id="a">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
@endsection
