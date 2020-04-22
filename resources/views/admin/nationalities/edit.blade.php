@extends('admin.layouts.app', ['page' => 'nationality'])

@section('title', 'Edit Nationality')

@section('content')
<div class="x_title">
    <h2>Edit Nationality</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.nationalities.update', ['nationality' => $nationality->id]) }}">
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
                value="{{ old('name', $nationality->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.nationalities.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
