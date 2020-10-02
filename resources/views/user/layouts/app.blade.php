<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <link href="{{ mix('/css/admin/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="/css/datatables.min.css" /> --}}

    {{-- You can put page wise internal css style in styles section --}}
    @stack('styles')
</head>
<body dir="rtl" class="nav-md">
    <div class="container body">
        <div class="main_container">
            {{-- Sidebar --}}
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('user.dashboard') }}" class="site_title">
                            <i class="fa fa-paw"></i>
                            <span>{{ config('app.name') }}</span>
                        </a>
                    </div>

                    {{-- Menu profile quick info --}}
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('images/admin-avatar.png') }}" alt="Admin avatar" class="img-circle profile_img">
                        </div>

                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::guard('web')->user()->name }}</h2>
                        </div>
                    </div>
                    <br>

                    {{-- Sidebar Menu --}}
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>

                            <ul class="nav side-menu">
                                <li {{ $page == 'dashboard' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.dashboard') }}">
                                        <i class="fa fa-home"></i>
                                        Dashboard
                                    </a>
                                </li>

                                {{-- <li {{ $page == 'mosque' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.mosques.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>المساجد</span>
                                    </a>
                                </li> --}}

                                <li {{ $page == 'room' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.rooms.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Rooms</span>
                                    </a>
                                </li>

                                <li {{ $page == 'student' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.students.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Students</span>
                                    </a>
                                </li>

                                <li {{ $page == 'teacher' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.teachers.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Teachers</span>
                                    </a>
                                </li>

                                <li {{ $page == 'course' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.courses.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Courses</span>
                                    </a>
                                </li>

                                <li {{ $page == 'nationality' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.nationalities.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Nationalities</span>
                                    </a>
                                </li>

                                {{-- <li {{ $page == 'gender' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.genders.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>الجنسs</span>
                                    </a>
                                </li> --}}

                                {{-- <li {{ $page == 'status' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.statuses.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Statuses</span>
                                    </a>
                                </li> --}}

                                <li {{ $page == 'exam' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.exams.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>Exams</span>
                                    </a>
                                </li>

                                {{-- <li {{ $page == 'level' ? ' class=active' : '' }}>
                                    <a href="{{ route('user.levels.index') }}">
                                        <i class="fa fa-arrow-right"></i>
                                        <span>إدارة المستويات</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Profile Menu --}}
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/admin-avatar.png') }}" alt="Admin avatar">

                                    {{ Auth::guard('web')->user()->name }}

                                    <span class="fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="{{ route('user.profile') }}">
                                            Profile
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('user.logout') }}">
                                            <i class="fa fa-sign-out pull-right"></i>
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>

            {{--  Page Content  --}}
            <div class="right_col" role="main">
                <div class="row tile_count">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content" style="display: block;">
                                <div class="row">
                                    @if ($errors->all())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $message)
                                                <li>{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

          
        </div>
    </div>

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>
    
    
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/datatables.min.js"></script>
    
    @if (session('message'))
    <script>
        showNotice("{{ session('type') }}", "{{ session('message') }}");
    </script>
    @endif
    <script>
        $(document).ready(function () {
                $('#table').DataTable();
                $('[data-toggle="tooltip"]').tooltip();
            });
            
    </script>
    
    {{-- You can put page wise javascript in scripts section --}}
    @stack('scripts')
    
    </body>
    
    </html>