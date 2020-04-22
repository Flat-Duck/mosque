@extends('admin.layouts.app', ['page' => 'course'])

@section('title', 'Add New Course')

@section('content')

<div class="x_title">
    <h2>Add New Course</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.courses.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time"
                class="form-control"
                name="start_time"
                required
                placeholder="Start Time"
                value="{{ old('start_time') }}"
                step="2"
                id="start_time"
            >
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time"
                class="form-control"
                name="end_time"
                required
                placeholder="End Time"
                value="{{ old('end_time') }}"
                step="2"
                id="end_time"
            >
        </div>

        <div class="form-group">
            <label for="level-id">Level</label>
            <select class="form-control"
                name="level_id"
                required
                id="level-id"
            >
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}"
                        {{ old('level_id') == $level->id ? 'selected' : '' }}
                    >
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('admin.courses.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
