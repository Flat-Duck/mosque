@extends('user.layouts.app', ['page' => 'course'])

@section('title', 'إضافة دورة جديدة')

@section('content')

<div class="x_title">
    <h2>إضافة دورة جديدة</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.courses.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="start_time">توقيت البداية</label>
            <input type="time"
                class="form-control"
                name="start_time"
                required
                placeholder="توقيت البداية"
                value="{{ old('start_time') }}"
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
                value="{{ old('end_time') }}"
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

        <a href="{{ route('user.courses.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
