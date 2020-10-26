@extends('user.layouts.app', ['page' => 'course'])

@section('title', 'تعديل الدورة')

@section('content')
<div class="x_title">
    <h2>تعديل الدورة</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.courses.update', ['course' => $course->id]) }}">
    @csrf
    @method('PUT')
<div class="form-group">
    <label for="teacher-id">المعلم</label>
    <select class="form-control" name="teacher_id" required id="teacher-id">
        @foreach ($teachers as $teacher)
        <option value="{{ $teacher->id }}" {{ old('teacher_id', $course->teacher_id) == $teacher->id ? 'selected' : '' }}>
            {{ $teacher->name }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="room-id">الفصل</label>
    <select class="form-control" name="room_id" required id="room-id">
        @foreach ($rooms as $room)
        <option value="{{ $room->id }}" {{ old('room_id', $course->room_id) == $room->id? 'selected' : '' }}>
            {{ $room->name }}
        </option>
        @endforeach
    </select>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="year">لسنة </label>
        <input type="text" class="form-control" name="year" required placeholder="yyyy-yyyy"
            value="{{ old('year', $course->year) }}" step="2" id="year">
    </div>
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
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.courses.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
