@extends('user.layouts.app', ['page' => 'student'])

@section('title', 'تعديل الطالب')

@section('content')
<div class="x_title">
    <h2>تعديل الطالب</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('user.students.update', ['student' => $student->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">
        <div class="form-group">
            <label for="national_number">الرقم الوطني</label>
            <input type="number"
                class="form-control"
                name="national_number"
                
                placeholder="الرقم الوطني"
                value="{{ old('national_number', $student->national_number) }}"
                step="any"
                id="national_number"
            >
        </div>
<input type="hidden" name="enrolment_number" value="{{ old('enrolment_number', $student->enrolment_number) }}">
        {{-- <div class="form-group">
            <label for="enrolment_number">رقم القيد</label>
            <input  type="number"
                class="form-control"
                name="enrolment_number"
                required
                placeholder="رقم القيد"
                value="{{ old('enrolment_number', $student->enrolment_number) }}"
                step="any"
                id="enrolment_number"
            >
        </div> --}}

        <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم"
                value="{{ old('name', $student->name) }}"
                id="name"
            >
        </div>
        <div class="form-group">
            <label for="date_join">تاريخ الإلتحاق</label>
            <input type="date"
                class="form-control"
                name="date_join"
                required
                placeholder="تاريخ الإلتحاق"
                value="{{ old('date_join',$student->date_join) }}"
                id="date_join"
            >
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
                        {{ old('mosque_id',$student->mosque_id) == $mosque->id ? 'selected' : '' }}
                    >
                        {{ $mosque->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_birth">تاريخ الميلاد</label>
            <input type="date"
                class="form-control"
                name="date_birth"
                required
                placeholder="تاريخ الميلاد"
                value="{{ old('date_birth', $student->date_birth) }}"
                id="date_birth"
            >
        </div>

        <div class="form-group">
            <label for="address">العنوان</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="العنوان"
            >{{ old('address', $student->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text"
                class="form-control"
                name="phone"
                required
                placeholder="رقم الهاتف"
                value="{{ old('phone', $student->phone) }}"
                id="phone"
            >
        </div>

        <div class="form-group">
            <label for="qualification">المؤهل التعليمي</label>
            <input type="text"
                class="form-control"
                name="qualification"
                required
                placeholder="المؤهل التعليمي"
                value="{{ old('qualification', $student->qualification) }}"
                id="qualification"
            >
        </div>

        <div class="form-group">
            <label for="notes">ملاحضات</label>
            <textarea class="form-control"
                name="notes"
                id="notes"
                required
                placeholder="Notes"
            >{{ old('notes', $student->notes) }}</textarea>
        </div>

        <div class="form-group">
            <label for="passport">رقم جواز السفر</label>
            <input type="text"
                class="form-control"
                name="passport"
                required
                placeholder="Passport"
                value="{{ old('passport', $student->passport) }}"
                id="passport"
            >
        </div>

        <div class="form-group">
            <label for="nationality-id">الجنسية</label>
            <select class="form-control"
                name="nationality_id"
                required
                id="nationality-id"
            >
                @foreach ($nationalities as $nationality)
                    <option value="{{ $nationality->id }}"
                        {{ old('nationality_id', $student->nationality_id) == $nationality->id ? 'selected' : '' }}
                    >
                        {{ $nationality->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="gender-id">الجنس</label>
            <select class="form-control"
                name="gender_id"
                required
                id="gender-id"
            >
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}"
                        {{ old('gender_id', $student->gender_id) == $gender->id ? 'selected' : '' }}
                    >
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status-id">الحالة</label>
            <select class="form-control"
                name="status_id"
                required
                id="status-id"
            >
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ old('status_id', $student->status_id) == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="course-id">الدورة</label>
            <select class="form-control"
                name="course_id"
                required
                id="course-id"
            >
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}
                    >
                        {{ $course->level->name }} || {{ $course->start_time }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>

        <a href="{{ route('user.students.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
