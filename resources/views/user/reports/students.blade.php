@extends('user.layouts.report', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
<div class="row">
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

@if (!is_null($students))
    
@forelse ($students as $k=> $student)
    
<div class="row">
    <div class="col-1-5">
        {{$k+1}}
    </div>
    <div class="col-1-10">
{{$student->name}}
    </div>
    <div class="col-1-52">
        {{$student->enrolment_number}}
    </div>
    <div class="col-1-10">
        {{$student->date_birth}}
    </div>
    <div class="col-1-10">
        {{$student->gender->name}}
    </div>
</div>
@empty
<p>لاتوجد بيانات</p>
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