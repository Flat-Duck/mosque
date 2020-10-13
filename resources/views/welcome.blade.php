<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a >Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Free Islamic Template | One Page Responsive Theme</title>
    <link href="css/uncss.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico">
</head>

<body dir="rtl" data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">ادارة شؤون الاوقاف</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="{{ url('/admin/dashboard') }}">دخول لجنة الاوقاف</a></li>
                        <li><a href="{{ url('/user/dashboard') }}">دحول مشرف المسجد</a></li>
                        <li><a href="{{ url('/result') }}">عرض نتائج الامنتحانات</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Free Masjid Theme</h1>
                        <p class="lead">This is a free masjid theme!<br>Download it at freeislamictemplates.appspot.com
                        </p>
                        <h1>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h1>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Ready To Go</h1>
                        <p class="lead">Download it<br>from freeislamictemplates.appspot.com</p>
                        <h1>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h1>
                    </div>
                </div>
            </div>
        </div>
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.unveil.js"></script>
    <script>
        $(document).ready(function(){$("img").unveil()});
    </script>
</body>

</html>