@extends('admin.layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <h1>Forgot password</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="post">
        @csrf

        <div>
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required autofocus>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                Send Password Reset Link
            </button>
        </div>
    </form>

    <a href="{{ route('admin.login') }}">
        Login
    </a>
@endsection
