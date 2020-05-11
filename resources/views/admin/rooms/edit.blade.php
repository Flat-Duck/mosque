@extends('admin.layouts.app', ['page' => 'room'])

@section('title', 'Edit Room')

@section('content')
<div class="x_title">
    <h2>Edit Room</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.rooms.update', ['room' => $room->id]) }}">
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
                value="{{ old('name', $room->name) }}"
                id="name"
            >
        </div>

        <div class="form-group">
            <label for="capacity">السعة</label>
            <input type="number"
                class="form-control"
                name="capacity"
                required
                placeholder="السعة"
                value="{{ old('capacity', $room->capacity) }}"
                step="any"
                id="capacity"
            >
        </div>

        <div class="form-group">
            <label for="floor">الطابق</label>
            <select class="form-control"
                name="floor"
                required
                id="floor"
            >
                @foreach ($floorOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('floor', $room->floor) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mosque-id">الجامع</label>
            <select class="form-control"
                name="mosque_id"
                required
                id="mosque-id"
            >
                @foreach ($mosques as $mosque)
                    <option value="{{ $mosque->id }}"
                        {{ old('mosque_id', $room->mosque_id) == $mosque->id ? 'selected' : '' }}
                    >
                        {{ $mosque->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.rooms.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
