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

    {{-- You can put page wise internal css style in styles section --}}
    @stack('styles')
</head>
<body dir="rtl">
{{--  Page Content  --}}
            <div class="right_col" role="main">
                <div class="row">
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

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>

    {{-- You can put page wise javascript in scripts section --}}
    @stack('scripts')
</body>
</html>