@extends('admin.layouts.app', ['page' => 'status'])

@section('title', 'Add New Status')

@section('content')

<div class="x_title">
    <h2>إضافة جديد Status</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.statuses.store') }}">
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

        <a href="{{ route('admin.statuses.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
