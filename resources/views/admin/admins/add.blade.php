@extends('admin.layouts.app', ['page' => 'admins'])

@section('title', 'إضافة مستخدم جديد')

@section('content')

<div class="x_title">
    <h2>إضافة مستخدم جديد</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.admins.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="name">الإسم كامل</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم كامل"
                value="{{ old('name') }}"
                id="name"
            >
        </div>
        <div class="form-group">
            <label for="username">اسم المستخدم</label>
            <input type="text"
                class="form-control"
                name="username"
                required
                placeholder="اسم المستخدم"
                value="{{ old('username') }}"
                id="username"
            >
        </div>
      <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email"
                class="form-control"
                name="email"
                required
                placeholder="البريد الإلكتروني"
                value="{{ old('email') }}"
                id="email"
            >
        </div>    
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>

        <a href="{{ route('admin.admins.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
