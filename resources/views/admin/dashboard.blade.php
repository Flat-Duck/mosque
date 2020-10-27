@extends('admin.layouts.app', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
    <p>
<div class="row" >
    <div class="tile_count">
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fas fa-user"></i>مجموع عدد المعلمين</span>
        <div class="count">{{App\Teacher::all()->count()}}</div>
        </div>
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-mosque"></i> مجموع عدد المساجد</span>
            <div class="count">{{App\Mosque::all()->count()}}</div>
        </div>
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-glasses"></i> مجموع عدد الطلبة </span>
            <div class="count green">{{App\Student::all()->count()}}</div>
        </div>
    </div>
</div>
    </p>
@endsection
