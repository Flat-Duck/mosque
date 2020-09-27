@extends('admin.layouts.app', ['page' => 'gender'])

@section('title', 'تعديل الجنس')

@section('content')
<div class="x_title">
    <h2>تعديل الجنس</h2>

    <div class="clearfix"></div>
</div>

<form role="form" method="POST" action="{{ route('admin.genders.update', ['gender' => $gender->id]) }}">
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
                value="{{ old('name', $gender->name) }}"
                id="name"
            >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.genders.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
