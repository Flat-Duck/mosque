@extends('user.layouts.app', ['page' => 'nationality'])

@section('title', 'Edit Nationality')

@section('content')
<div class="x_title">
    <h2>Edit Nationality</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.nationalities.update', ['nationality' => $nationality->id]) }}">
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
                value="{{ old('name', $nationality->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.nationalities.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
