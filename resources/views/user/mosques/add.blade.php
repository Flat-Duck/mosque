@extends('user.layouts.app', ['page' => 'mosque'])

@section('title', 'إضافة مسجد جديد')

@section('content')

<div class="x_title">
    <h2>إضافة مسجد جديد</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.mosques.store') }}">
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

        <div class="form-group">
            <label for="address">العنوان</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="العنوان"
            >{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_construction">تاريخ الإنشاء</label>
            <input type="date"
                class="form-control"
                name="date_construction"
                required
                placeholder="تاريخ الإنشاء"
                value="{{ old('date_construction') }}"
                id="date_construction"
            >
        </div>

        <div class="form-group">
            <label for="street">الشارع</label>
            <textarea class="form-control"
                name="street"
                id="street"
                required
                placeholder="الشارع"
            >{{ old('street') }}</textarea>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>

        <a href="{{ route('user.mosques.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
