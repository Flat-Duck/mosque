@extends('admin.layouts.app', ['page' => 'nationality'])

@section('title', 'Add New Nationality')

@section('content')

<div class="x_title">
    <h2>Add New Nationality</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.nationalities.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="Name"
                value="{{ old('name') }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('admin.nationalities.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
