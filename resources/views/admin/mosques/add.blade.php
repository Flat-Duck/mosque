@extends('admin.layouts.app', ['page' => 'mosque'])

@section('title', 'Add New Mosque')

@section('content')

<div class="x_title">
    <h2>Add New Mosque</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.mosques.store') }}">
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

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="Address"
            >{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_construction">Date Construction</label>
            <input type="date"
                class="form-control"
                name="date_construction"
                required
                placeholder="Date Construction"
                value="{{ old('date_construction') }}"
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
            >{{ old('street') }}</textarea>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('admin.mosques.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
