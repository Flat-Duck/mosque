@extends('user.layouts.app', ['page' => 'gender'])

@section('title', 'Add New الجنس')

@section('content')

<div class="x_title">
    <h2>Add New الجنس</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.genders.store') }}">
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
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{ route('user.genders.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</form>
@endsection
