@extends('user.layouts.guest')

@section('title', 'إعادة ظبط كلمة المرور')

@section('content')
    <h1>إعادة ظبط كلمة المرور</h1>

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
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div>
            <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">إعادة ظبط كلمة المرور</button>
        </div>
    </form>
@endsection
