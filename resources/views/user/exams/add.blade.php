@extends('user.layouts.app', ['page' => 'exam'])

@section('title', 'إضافة إمتحان جديد')

@section('content')

<div class="x_title">
    <h2>إضافة إمتحان جديد</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.exams.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="date">التاريخ</label>
            <input type="date"
                class="form-control"
                name="date"
                required
                placeholder="التاريخ"
                value="{{ old('date') }}"
                id="date"
            >
        </div>

        <div class="form-group">
            <label for="save">الحفظ</label>
            <input type="number"
                class="form-control"
                name="save"
                required
                placeholder="الحفظ"
                value="{{ old('save') }}"
                step="any"
                id="save"
            >
        </div>

        <div class="form-group">
            <label for="applied_rules">الأحكام التطبيقية</label>
            <input type="number"
                class="form-control"
                name="applied_rules"
                required
                placeholder="الأحكام التطبيقية"
                value="{{ old('applied_rules') }}"
                step="any"
                id="applied_rules"
            >
        </div>

        <div class="form-group">
            <label for="drawing">الرسم القرأني</label>
            <input type="number"
                class="form-control"
                name="drawing"
                required
                placeholder="الرسم القرأني"
                value="{{ old('drawing') }}"
                step="any"
                id="drawing"
            >
        </div>

        <div class="form-group">
            <label for="pronunciation">أحكام التجويد</label>
            <input type="number"
                class="form-control"
                name="pronunciation"
                required
                placeholder="أحكام التجويد"
                value="{{ old('pronunciation') }}"
                step="any"
                id="pronunciation"
            >
        </div>

        <div class="form-group">
            <label for="student-id">الطالب</label>
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
            <label for="teacher-id">المعلم</label>
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

        <a href="{{ route('user.exams.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
