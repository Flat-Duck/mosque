@extends('admin.layouts.report', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-1-5 panel">
        #
    </div>
    <div class="col-1-10 panel">
        اسم المسجد
    </div>
    <div class="col-1-52 panel">
        العنوان
    </div>
    <div class="col-1-10 panel">
        الشارع
    </div>
    <div class="col-1-10 panel">
        تاريخ الانشاء
    </div>
</div>
@if (!is_null($mosques))
@forelse ($mosques as $k=> $mosque)
    
<div class="row">
    <div class="col-1-5">
        {{$k+1}}
    </div>
    <div class="col-1-10">
{{$mosque->name}}
    </div>
    <div class="col-1-52">
        {{$mosque->address}}
    </div>
    <div class="col-1-10">
        {{$mosque->street}}
    </div>
    <div class="col-1-10">
        {{$mosque->date_construction}}
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
        اسم المسجد
    </div>
    <div class="col-1-52 panel">
        العنوان
    </div>
    <div class="col-1-10 panel">
        الشارع
    </div>
    <div class="col-1-10 panel">
        تاريخ الانشاء
    </div>
</div>
@endsection