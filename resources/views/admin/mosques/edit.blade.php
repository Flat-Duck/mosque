@extends('admin.layouts.app', ['page' => 'mosque'])

@section('title', 'Edit Mosque')

@section('content')
<div class="x_title">
    <h2>Edit Mosque</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.mosques.update', ['mosque' => $mosque->id]) }}">
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
                value="{{ old('name', $mosque->name) }}"
                id="name"
            >
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="Address"
            >{{ old('address', $mosque->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_construction">Date Construction</label>
            <input type="date"
                class="form-control"
                name="date_construction"
                required
                placeholder="Date Construction"
                value="{{ old('date_construction', $mosque->date_construction) }}"
                id="date_construction"
            >
        </div>

        <div class="form-group">
            <label for="street">Street</label>
            <textarea class="form-control"
                name="street"
                id="street"
                required
                placeholder="Street"
            >{{ old('street', $mosque->street) }}</textarea>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.mosques.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
