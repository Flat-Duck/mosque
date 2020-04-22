@extends('admin.layouts.app', ['page' => 'exam'])

@section('title', 'Add New Exam')

@section('content')

<div class="x_title">
    <h2>Add New Exam</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('admin.exams.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date"
                class="form-control"
                name="date"
                required
                placeholder="Date"
                value="{{ old('date') }}"
                id="date"
            >
        </div>

        <div class="form-group">
            <label for="save">Save</label>
            <input type="number"
                class="form-control"
                name="save"
                required
                placeholder="Save"
                value="{{ old('save') }}"
                step="any"
                id="save"
            >
        </div>

        <div class="form-group">
            <label for="applied_rules">Applied Rules</label>
            <input type="number"
                class="form-control"
                name="applied_rules"
                required
                placeholder="Applied Rules"
                value="{{ old('applied_rules') }}"
                step="any"
                id="applied_rules"
            >
        </div>

        <div class="form-group">
            <label for="drawing">Drawing</label>
            <input type="number"
                class="form-control"
                name="drawing"
                required
                placeholder="Drawing"
                value="{{ old('drawing') }}"
                step="any"
                id="drawing"
            >
        </div>

        <div class="form-group">
            <label for="pronunciation">Pronunciation</label>
            <input type="number"
                class="form-control"
                name="pronunciation"
                required
                placeholder="Pronunciation"
                value="{{ old('pronunciation') }}"
                step="any"
                id="pronunciation"
            >
        </div>

        <div class="form-group">
            <label for="student-id">Student</label>
            <select class="form-control"
                name="student_id"
                required
                id="student-id"
            >
                @foreach ($students as $student)
                    <option value="{{ $student->id }}"
                        {{ old('student_id') == $student->id ? 'selected' : '' }}
                    >
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="teacher-id">Teacher</label>
            <select class="form-control"
                name="teacher_id"
                required
                id="teacher-id"
            >
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}"
                        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}
                    >
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
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

        <a href="{{ route('admin.exams.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
