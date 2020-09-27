@extends('admin.layouts.app', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
    <p>
<div class="row" >
    <div class="tile_count">
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fas fa-mosque"></i> Total Teachers</span>
            <div class="count">2500</div>
        </div>
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Total Mosques</span>
            <div class="count">123.50</div>
        </div>
        <div class="col-md-4 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total </span>
            <div class="count green">2,500</div>
        </div>
    </div>
</div>
    </p>
@endsection
