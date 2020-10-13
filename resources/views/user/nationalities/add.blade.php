@extends('user.layouts.app', ['page' => 'nationality'])

@section('title', 'إضافة جنسية جديدة')

@section('content')

<div class="x_title">
    <h2>إضافة جنسية جديدة</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.nationalities.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم"
                value="{{ old('name') }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>

        <a href="{{ route('user.nationalities.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
