@extends('admin.layouts.app', ['page' => 'admins'])

@section('title', 'تعديل المستخدم')

@section('content')
<div class="x_title">
    <h2>تعديل المستخدم</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.admins.update', ['admin' => $admin->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">


        <div class="form-group">
            <label for="name">الإسم كامل</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم كامل"
                value="{{ old('name', $admin->name) }}"
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
                value="{{ old('username', $admin->username) }}"
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
                value="{{ old('email', $admin->email) }}"
                id="email"
            >
        </div>    
    <input type="hidden" name="password" value="{{old('password', $admin->password)}}">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('admin.admins.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
