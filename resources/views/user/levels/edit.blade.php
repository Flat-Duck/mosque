@extends('user.layouts.app', ['page' => 'level'])

@section('title', 'Edit Level')

@section('content')
<div class="x_title">
    <h2>Edit Level</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.levels.update', ['level' => $level->id]) }}">
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
                value="{{ old('name', $level->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.levels.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
