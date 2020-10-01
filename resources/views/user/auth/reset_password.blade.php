@extends('user.layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <h1>Reset password</h1>

    <form method="post" action="{{ route('user.reset_password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <input type="email"
                name="email"
                class="form-control"
                value="{{ $email ?? old('email') }}"
                placeholder="البريد الإلكتروني"
                required
                autofocus
            >
        </div>

        <div>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
    </form>
@endsection
