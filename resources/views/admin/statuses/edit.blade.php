@extends('admin.layouts.app', ['page' => 'status'])

@section('title', 'Edit Status')

@section('content')
<div class="x_title">
    <h2>Edit Status</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.statuses.update', ['status' => $status->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="Name"
                value="{{ old('name', $status->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.statuses.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
