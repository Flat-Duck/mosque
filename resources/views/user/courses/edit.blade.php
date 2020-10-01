@extends('user.layouts.app', ['page' => 'course'])

@section('title', 'Edit Course')

@section('content')
<div class="x_title">
    <h2>Edit Course</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.courses.update', ['course' => $course->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">
        <div class="form-group">
            <label for="start_time">توقيت البداية</label>
            <input type="time"
                class="form-control"
                name="start_time"
                required
                placeholder="توقيت البداية"
                value="{{ old('start_time', $course->start_time) }}"
                step="2"
                id="start_time"
            >
        </div>

        <div class="form-group">
            <label for="end_time">توقيت النهاية</label>
            <input type="time"
                class="form-control"
                name="end_time"
                required
                placeholder="توقيت النهاية"
                value="{{ old('end_time', $course->end_time) }}"
                step="2"
                id="end_time"
            >
        </div>

        <div class="form-group">
            <label for="level-id">المستوى</label>
            <select class="form-control"
                name="level_id"
                required
                id="level-id"
            >
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}"
                        {{ old('level_id', $course->level_id) == $level->id ? 'selected' : '' }}
                    >
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('user.courses.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection