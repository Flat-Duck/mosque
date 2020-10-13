@extends('user.layouts.app', ['page' => 'room'])

@section('title', 'إضافة غرفة جديدة')

@section('content')

<div class="x_title">
    <h2>إضافة غرفة جديدة</h2>

    <div class="clearfix"></div>
</div>

<br>

<form role="form" method="POST" action="{{ route('user.rooms.store') }}">
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
            <label for="capacity">السعة</label>
            <input type="number"
                class="form-control"
                name="capacity"
                required
                placeholder="السعة"
                value="{{ old('capacity') }}"
                step="any"
                id="capacity"
            >
        </div>

        <div class="form-group">
            <label for="floor">الطابق</label>
            <select class="form-control"
                name="floor"
                required
                id="floor"
            >
                @foreach ($floorOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('floor') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
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
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>

        <a href="{{ route('user.rooms.index') }}" class="btn btn-default">
            إلغاء
        </a>
    </div>
</form>
@endsection
