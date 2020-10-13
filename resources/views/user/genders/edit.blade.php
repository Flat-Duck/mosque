@extends('user.layouts.app', ['page' => 'gender'])

@section('title', 'تعديل الجنس')

@section('content')
<div class="x_title">
    <h2>تعديل الجنس</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.genders.update', ['gender' => $gender->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">
        <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم"
                value="{{ old('name', $gender->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.genders.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
