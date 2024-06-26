@extends('layouts.auth')

@section('content')
    <div class="login-wrapper">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="post" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}"
                    @error('email') style="border: 1px solid red;" @enderror>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>

            @error('failed')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </form>
    </div>
@endsection

<style>
    .login-wrapper {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .login-wrapper h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-form .form-group {
        margin-bottom: 15px;
    }

    .login-form .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-form .form-check {
        display: flex;
        align-items: center;
    }

    .login-form .form-check-input {
        margin-right: 10px;
    }

    .login-form .form-check-label {
        margin: 0;
    }

    .login-form .btn-block {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
    }

    .login-form .text-danger {
        display: block;
        margin-top: 5px;
    }

    .alert {
        margin-top: 10px;
    }
</style>
