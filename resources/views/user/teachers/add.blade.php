@extends('user.layouts.app', ['page' => 'teacher'])

@section('title', 'إضافة أستاذ جديد')

@section('content')

<div class="x_title">
    <h2>إضافة أستاذ جديد</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.teachers.store') }}">
    @csrf

    <div class="box-body">
        <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="الإسم"
                value="{{ old('name') }}"
                id="name"
            >
        </div>

        <div class="form-group">
            <label for="date_birth">تاريخ الميلاد</label>
            <input type="date"
                class="form-control"
                name="date_birth"
                required
                placeholder="تاريخ الميلاد"
                value="{{ old('date_birth') }}"
                id="date_birth"
            >
        </div>

        <div class="form-group">
            <label for="family_booklet_number">رقم كتيب العائلة</label>
            <input type="number"
                class="form-control"
                name="family_booklet_number"
                required
                placeholder="رقم كتيب العائلة"
                value="{{ old('family_booklet_number') }}"
                step="any"
                id="family_booklet_number"
            >
        </div>

        <div class="form-group">
            <label for="designation">طبيعة التكليف</label>
            <select class="form-control"
                name="designation"
                required
                id="designation"
            >
                @foreach ($designationOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('designation') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">الصفة</label>
            <select class="form-control"
                name="description"
                required
                id="description"
            >
                @foreach ($descriptionOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('description') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_designation">تاريخ التكليف</label>
            <input type="date"
                class="form-control"
                name="date_designation"
                required
                placeholder="تاريخ التكليف"
                value="{{ old('date_designation') }}"
                id="date_designation"
            >
        </div>

        <div class="form-group">
            <label for="address">العنوان</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="العنوان"
            >{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="bank">المصرف</label>
            <input type="text"
                class="form-control"
                name="bank"
                required
                placeholder="المصرف"
                value="{{ old('bank') }}"
                id="bank"
            >
        </div>

        <div class="form-group">
            <label for="branch">الفرع</label>
            <input type="text"
                class="form-control"
                name="branch"
                required
                placeholder="الفرع"
                value="{{ old('branch') }}"
                id="branch"
            >
        </div>

        <div class="form-group">
            <label for="account">رقم الحساب</label>
            <input type="text"
                class="form-control"
                name="account"
                required
                placeholder="رقم الحساب"
                value="{{ old('account') }}"
                id="account"
            >
        </div>

        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text"
                class="form-control"
                name="phone"
                required
                placeholder="رقم الهاتف"
                value="{{ old('phone') }}"
                id="phone"
            >
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email"
                class="form-control"
                name="email"
                required
                placeholder="البريد الإلكتروني"
                value="{{ old('email') }}"
                id="email"
            >
        </div>

        <div class="form-group">
            <label for="certificate">إجازة القرأن</label>
            <select class="form-control"
                name="certificate"
                required
                id="certificate"
            >
                @foreach ($certificateOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('certificate') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_certificate">تاريخ الإجازة</label>
            <input type="date"
                class="form-control"
                name="date_certificate"
                required
                placeholder="تاريخ الإجازة"
                value="{{ old('date_certificate') }}"
                id="date_certificate"
            >
        </div>

        <div class="form-group">
            <label for="certificate_place">جهة الاصدار</label>
            <input type="text"
                class="form-control"
                name="certificate_place"
                required
                placeholder="جهة الاصدار"
                value="{{ old('certificate_place') }}"
                id="certificate_place"
            >
        </div>

        <div class="form-group">
            <label for="national_number">الرقم الوطني</label>
            <input type="number"
                class="form-control"
                name="national_number"
                required
                placeholder="الرقم الوطني"
                value="{{ old('national_number') }}"
                step="any"
                id="national_number"
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
                        {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}
                    >
                        {{ $mosque->name }}
                    </option>
                @endforeach
            </select>
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
                        {{ old('nationality_id') == $nationality->id ? 'selected' : '' }}
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
                        {{ old('gender_id') == $gender->id ? 'selected' : '' }}
                    >
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status-id">Status</label>
            <select class="form-control"
                name="status_id"
                required
                id="status-id"
            >
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ old('status_id') == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('user.teachers.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
