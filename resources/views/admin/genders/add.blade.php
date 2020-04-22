@extends('admin.layouts.app', ['page' => 'gender'])

@section('title', 'Add New Gender')

@section('content')

<div class="x_title">
    <h2>Add New Gender</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.genders.store') }}">
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

        <a href="{{ route('admin.genders.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
