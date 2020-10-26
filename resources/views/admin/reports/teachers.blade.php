@extends('admin.layouts.report', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-1-5 panel">
        #
    </div>
    <div class="col-1-10 panel">
        اسم المعلم
    </div>
    <div class="col-1-10 panel">
        تاريخ الميلاد
    </div>
    <div class="col-1-52 panel">
        تاريخ التكليف
    </div>
    <div class="col-1-10 panel">
        الجنس
    </div>
</div>

@if (!is_null($teachers))

@forelse ($teachers as $k=> $teacher)

<div class="row">
    <div class="col-1-5">
        {{$k+1}}
    </div>
    <div class="col-1-10">
        {{$teacher->name}}
    </div>
    <div class="col-1-52">
        {{$teacher->date_birth}}
    </div>
    <div class="col-1-10">
        {{$teacher->date_designation}}
    </div>
    <div class="col-1-10">
        {{$teacher->gender->name}}
    </div>
</div>
@empty
<p>No replies</p>
@endforelse
@endif
<div class="row panel">
    <div class="col-1-5 panel">
        #
    </div>
    <div class="col-1-10 panel">
        اسم الطالب
    </div>
    <div class="col-1-52 panel">
        رقم القيد
    </div>
    <div class="col-1-10 panel">
        تاريخ الميلاد
    </div>
    <div class="col-1-10 panel">
        الجنس
    </div>
</div>
@endsection