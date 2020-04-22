@extends('admin.layouts.app', ['page' => 'room'])

@section('title', 'Add New Room')

@section('content')

<div class="x_title">
    <h2>Add New Room</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.rooms.store') }}">
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
            <label for="capacity">Capacity</label>
            <input type="number"
                class="form-control"
                name="capacity"
                required
                placeholder="Capacity"
                value="{{ old('capacity') }}"
                step="any"
                id="capacity"
            >
        </div>

        <div class="form-group">
            <label for="floor">Floor</label>
            <select class="form-control"
                name="floor"
                required
                id="floor"
            >
                @foreach ($floorOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('floor') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mosque-id">Mosque</label>
            <select class="form-control"
                name="mosque_id"
                required
                id="mosque-id"
            >
                @foreach ($mosques as $mosque)
                    <option value="{{ $mosque->id }}"
                        {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}
                    >
                        {{ $mosque->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('admin.rooms.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
