@extends('admin.layouts.app', ['page' => 'teacher'])

@section('title', 'Edit Teacher')

@section('content')
<div class="x_title">
    <h2>Edit Teacher</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.teachers.update', ['teacher' => $teacher->id]) }}">
    @csrf
    @method('PUT')

    <div class="box-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                class="form-control"
                name="name"
                required
                placeholder="Name"
                value="{{ old('name', $teacher->name) }}"
                id="name"
            >
        </div>

        <div class="form-group">
            <label for="date_birth">Date Birth</label>
            <input type="date"
                class="form-control"
                name="date_birth"
                required
                placeholder="Date Birth"
                value="{{ old('date_birth', $teacher->date_birth) }}"
                id="date_birth"
            >
        </div>

        <div class="form-group">
            <label for="family_booklet_number">Family Booklet Number</label>
            <input type="number"
                class="form-control"
                name="family_booklet_number"
                required
                placeholder="Family Booklet Number"
                value="{{ old('family_booklet_number', $teacher->family_booklet_number) }}"
                step="any"
                id="family_booklet_number"
            >
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <select class="form-control"
                name="designation"
                required
                id="designation"
            >
                @foreach ($designationOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('designation', $teacher->designation) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <select class="form-control"
                name="description"
                required
                id="description"
            >
                @foreach ($descriptionOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('description', $teacher->description) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_designation">Date Designation</label>
            <input type="date"
                class="form-control"
                name="date_designation"
                required
                placeholder="Date Designation"
                value="{{ old('date_designation', $teacher->date_designation) }}"
                id="date_designation"
            >
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control"
                name="address"
                id="address"
                required
                placeholder="Address"
            >{{ old('address', $teacher->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="bank">Bank</label>
            <input type="text"
                class="form-control"
                name="bank"
                required
                placeholder="Bank"
                value="{{ old('bank', $teacher->bank) }}"
                id="bank"
            >
        </div>

        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text"
                class="form-control"
                name="branch"
                required
                placeholder="Branch"
                value="{{ old('branch', $teacher->branch) }}"
                id="branch"
            >
        </div>

        <div class="form-group">
            <label for="account">Account</label>
            <input type="text"
                class="form-control"
                name="account"
                required
                placeholder="Account"
                value="{{ old('account', $teacher->account) }}"
                id="account"
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text"
                class="form-control"
                name="phone"
                required
                placeholder="Phone"
                value="{{ old('phone', $teacher->phone) }}"
                id="phone"
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                class="form-control"
                name="email"
                required
                placeholder="Email"
                value="{{ old('email', $teacher->email) }}"
                id="email"
            >
        </div>

        <div class="form-group">
            <label for="certificate">Certificate</label>
            <select class="form-control"
                name="certificate"
                required
                id="certificate"
            >
                @foreach ($certificateOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('certificate', $teacher->certificate) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_certificate">Date Certificate</label>
            <input type="date"
                class="form-control"
                name="date_certificate"
                required
                placeholder="Date Certificate"
                value="{{ old('date_certificate', $teacher->date_certificate) }}"
                id="date_certificate"
            >
        </div>

        <div class="form-group">
            <label for="certificate_place">Certificate Place</label>
            <input type="text"
                class="form-control"
                name="certificate_place"
                required
                placeholder="Certificate Place"
                value="{{ old('certificate_place', $teacher->certificate_place) }}"
                id="certificate_place"
            >
        </div>

        <div class="form-group">
            <label for="national_number">National Number</label>
            <input type="number"
                class="form-control"
                name="national_number"
                required
                placeholder="National Number"
                value="{{ old('national_number', $teacher->national_number) }}"
                step="any"
                id="national_number"
            >
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
                        {{ old('mosque_id', $teacher->mosque_id) == $mosque->id ? 'selected' : '' }}
                    >
                        {{ $mosque->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nationality-id">Nationality</label>
            <select class="form-control"
                name="nationality_id"
                required
                id="nationality-id"
            >
                @foreach ($nationalities as $nationality)
                    <option value="{{ $nationality->id }}"
                        {{ old('nationality_id', $teacher->nationality_id) == $nationality->id ? 'selected' : '' }}
                    >
                        {{ $nationality->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="gender-id">Gender</label>
            <select class="form-control"
                name="gender_id"
                required
                id="gender-id"
            >
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}"
                        {{ old('gender_id', $teacher->gender_id) == $gender->id ? 'selected' : '' }}
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
                        {{ old('status_id', $teacher->status_id) == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.teachers.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
