<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style media="screen">
      body {
            font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
            }
            
            header:before,
            header:after {
            content: " ";
            display: table;
            }
            
            header:after {
            clear: both;
            }
            
            .invoiceNbr {
            font-size: 20px;
            margin-left: 30px;
            margin-top: 30px;
            float: left;
            }
            
            .logo {
           float: inherit;
            text-align: -webkit-center;
            }
            
            .from {
            float: right;
            }
            
            .to {
            float: left;
            }
            
            .fromto {
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5;
            border-radius: 5px;
            margin: 20px;
            min-width: 200px;
            }
            
            .fromtocontent {
            margin: 10px;
            margin-left: 15px;
            }
            
            .panel {
            background-color: #e8e5e5;
            padding: 7px;
            }
            
            .items {
            clear: both;
            display: table;
            padding: 20px;
            }
            
            /* Factor out common styles for all of the "col-" classes.*/
            div[class^="col-"] {
            display: table-cell;
            padding: 7px;
            }
            
            /*for clarity name column styles by the percentage of width */
            .col-1-5 {
            width: 5%;
            }
            .col-1-10 {
            width: 10%;
            }
            .col-1-20 {
            width: 20%;
            }
            .col-1-30 {
            width: 30%;
            }
            .col-1-40 {
            width: 40%;
            }
            .col-1-60 {
            width: 60%;
            }
            
            .col-1-52 {
            width: 52%;
            }
            
            .row {
            display: table-row;
            page-break-inside: avoid;
            }
          </style>
    <style media="print">
       body {
        font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
        }
         header:before,
            header:after {
            content: " ";
            display: table;
            }
            
            header:after {
            clear: both;
            }
            
            .invoiceNbr {
            font-size: 20px;
            margin-left: 30px;
            margin-top: 30px;
            float: left;
            }
            
            .logo {
           float: inherit;
            text-align: -webkit-center;
            }
            
        
        .from {
        float: right;
        }
        
        .to {
        float: left;
        }
        
        .fromto {
        border-style: solid;
        border-width: 1pt;
        border-color: #e8e5e5;
        border-radius: 5pt;
        margin: 20pt;
        min-width: 200pt;
        }
        
        .fromtocontent {
        margin: 10pt;
        margin-left: 15pt;
        }
        
        .panel {
        background-color: #e8e5e5;
        padding: 7pt;
        }
        
        .items {
        clear: both;
        display: table;
        padding: 20pt;
        }
        
        div[class^="col-"] {
        display: table-cell;
        padding: 7pt;
        }
        
        .col-1-10 {
        width: 10%;
        }
        
        .col-1-52 {
        width: 52%;
        }
        
        .row {
        display: table-row;
        page-break-inside: avoid;
        }
    </style>

</head>

<body dir="rtl">
    <header>
        <div class="logo">
          <h1>  الهيئة العامة للاوقاف</h1>
        <h3>{{\Auth::user()->teacher->mosque->name}}</h3>
        <h5>{{$reportName}}</h5>
        </div>
        <div class="invoiceNbr">
            تاريخ: {{Carbon\Carbon::now()}}
        </div>
    </header>

    {{-- <div class="fromto from">
        <div class="panel">FROM:</div>
        <div class="fromtocontent">
            <span>Robert Crowley</span><br />
            <span>123 My St.</span><br />
            <span>Portland ME, 04101</span><br />
        </div>
    </div>
    <div class="fromto to">
        <div class="panel">TO:</div>
        <div class="fromtocontent">
            <span>Someone</span><br />
            <span>123 Street St.</span><br />
            <span>Portland ME, 04101</span>
        </div>
    </div> --}}

    <section class="items">
        @yield('content')
        <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->

    </section>
</body>

</html>

{{-- <!doctype html>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}