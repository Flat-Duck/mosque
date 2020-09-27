@extends('admin.layouts.app', ['page' => 'level'])

@section('title', 'إضافة مستوى جديد')

@section('content')

<div class="x_title">
    <h2>إضافة مستوى جديد</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.levels.store') }}">
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
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('admin.levels.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
