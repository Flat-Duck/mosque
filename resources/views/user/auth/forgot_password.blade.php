@extends('user.layouts.guest')

@section('title', 'نسيت كلمة المرور')

@section('content')
    <h1>نسيت كلمة المرور</h1>

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
                إرسال رسالة إعادة ظبط كلمة المرور
            </button>
        </div>
    </form>

    <a href="{{ route('user.login') }}">
        تسجيل الدخول
    </a>
@endsection
