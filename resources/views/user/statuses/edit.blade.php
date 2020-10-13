@extends('user.layouts.app', ['page' => 'status'])

@section('title', 'Edit Status')

@section('content')
<div class="x_title">
    <h2>Edit Status</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.statuses.update', ['status' => $status->id]) }}">
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
                value="{{ old('name', $status->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.statuses.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
