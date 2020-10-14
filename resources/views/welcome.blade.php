<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>مسجدنا</title>
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
                    <a class="navbar-brand" style="" href="#">مسجدنا</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="{{ url('/admin/dashboard') }}">دخول لجنة الاوقاف</a></li>
                        <li><a href="{{ url('/user/dashboard') }}">دخول مشرف المسجد</a></li>
                        <li><a href="{{ url('/result') }}">عرض نتائج الامتحانات</a></li>

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
                        <h1>اهلا وسهلا</h1>
                        <p class="lead">مرحبا بكم<br>سارع بالدخول
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
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    {{-- <script src="js/jquery.isotope.min.js"></script> --}}
    {{-- <script src="js/jquery.prettyPhoto.js"></script> --}}
    {{-- <script src="js/main.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.unveil.js"></script>
    <script>
        $(document).ready(function(){$("img").unveil()});
    </script> --}}
</body>

</html>