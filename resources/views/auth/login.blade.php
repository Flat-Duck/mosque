@extends('user.layouts.guest')

@section('title', 'تسجيل الدخول')

@section('content')
<h1>تسجيل الدخول</h1>

<form method="post">
    @csrf

    <div>
        <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني" required>
    </div>

    <div>
        <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
    </div>

    <div class="text-left">
        <label for="login-checkbox">
            <input type="checkbox" id="login-checkbox" name="remember">تذكرني
        </label>
    </div> <br>

    <div>
        <button type="submit" class="btn btn-default submit">
            تسجيل دخول
        </button>

        <a href="{{ route('user.forgot_password') }}">
            لقد نسيت كلمة المرور
        </a>
    </div>

    <div class="clearfix"></div>
</form>
@endsection