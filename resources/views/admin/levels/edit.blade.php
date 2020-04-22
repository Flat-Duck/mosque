@extends('admin.layouts.app', ['page' => 'level'])

@section('title', 'Edit Level')

@section('content')
<div class="x_title">
    <h2>Edit Level</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.levels.update', ['level' => $level->id]) }}">
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
                value="{{ old('name', $level->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.levels.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
