@extends('user.layouts.app', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
<p>
    <div class="row">
        <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fas fa-user"></i>مجموع عدد المعلمين</span>
                <div class="count">{{\Auth::user()->teacher->mosque->teachers->count()}}</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-mosque"></i> مجموع عدد الفصول</span>
                <div class="count">{{\Auth::user()->teacher->mosque->rooms->count()}}</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-glasses"></i> مجموع عدد الطلبة </span>
                <div class="count green">{{\Auth::user()->teacher->mosque->students->count()}}</div>
            </div>
        </div>
    </div>
</p>
@endsection