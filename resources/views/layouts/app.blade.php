
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href={{asset("app/img/favicon.png")}}>
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- CSS here -->
    <link rel="stylesheet" href={{asset("app/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("app/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("app/css/magnific-popup.css")}}>
    <link rel="stylesheet" href={{asset("app/css/font-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("app/css/themify-icons.css")}}>
    <link rel="stylesheet" href={{asset("app/css/nice-select.css")}}>
    <link rel="stylesheet" href={{asset("app/css/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("app/css/gijgo.css")}}>
    <link rel="stylesheet" href={{asset("app/css/animate.css")}}>
    <link rel="stylesheet" href={{asset("app/css/slicknav.css")}}>
    <link rel="stylesheet" href={{asset("app/css/style.css")}}>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header_wrap d-flex justify-content-between align-items-center">
                            <div class="header_left">
                                <div class="logo">
                                    <a href="{{route('posts.index')}}">
                                        <h1><i>Alga.kz</i></h1>
                                    </a>
                                </div>
                            </div>
                            <div class="header_right d-flex align-items-center">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">

                                            <li><a  href="posts.index">home</a></li>


                                                        <!-- Authentication Links -->
                                                        @guest
                                                            @if (Route::has('login'))
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                                </li>
                                                            @endif

                                                            @if (Route::has('register'))
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                                </li>
                                                            @endif
                                                        @else
                                                            @if(Auth::user()->role->name == 'admin')

                                                                <li class="nav-item">

                                                                    <a class="dropdown-item" href="{{route('adm.users.index')}}">Admin page</a>
                                                                </li>
                                                            @elseif(Auth::user()->role->name == 'moderator')
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="{{ route('adm.categories.index') }}">Moderator page</a>
                                                                </li>
                                                            @endif
                                                            <li class="nav-item dropdown">
                                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    {{ Auth::user()->name }}
                                                                </a>

                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item" href="{{ route('logout') }}" style="height: 10px;"
                                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                    </a>

                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </li>
                                                        @endguest
                                                    </ul>
                                                </div>

                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- slider_area_start -->

@if (session('message'))
    <div class="container mt-5">
        <div class="col-9 mx-auto">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<main class="py-4">
    @yield('content')
</main>
</div>

<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="newsLetter_wrap">
                <div class="row justify-content-between">
                    <div class="col-md-7">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Stay Updated
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Email Address">
                                <button type="submit">Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Stay Updated
                            </h3>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            About Us
                        </h3>
                        <ul>
                            <li><a href="#">Online Learning</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Campus
                        </h3>
                        <ul>
                            <li><a href="#">Our Plans</a></li>
                            <li><a href="#">Free Trial</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end  -->

<!-- footer end  -->


<!-- JS here -->
<script src={{asset("app/js/vendor/modernizr-3.5.0.min.js")}}></script>
<script src={{asset("app/js/vendor/jquery-1.12.4.min.js")}}></script>
<script src={{asset("app/js/popper.min.js")}}></script>
<script src={{asset("app/js/bootstrap.min.js")}}></script>
<script src={{asset("app/js/owl.carousel.min.js")}}></script>
<script src={{asset("app/js/isotope.pkgd.min.js")}}></script>
<script src={{asset("app/js/ajax-form.js")}}></script>
<script src={{asset("app/js/waypoints.min.js")}}></script>
<script src={{asset("app/js/jquery.counterup.min.js")}}></script>
<script src={{asset("app/js/imagesloaded.pkgd.min.js")}}></script>
<script src={{asset("app/js/scrollIt.js")}}></script>
<script src={{asset("app/js/jquery.scrollUp.min.js")}}></script>
<script src={{asset("app/js/wow.min.js")}}></script>
<script src={{asset("app/js/nice-select.min.js")}}></script>
<script src={{asset("app/js/jquery.slicknav.min.js")}}></script>
<script src={{asset("app/js/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("app/js/plugins.js")}}></script>
<script src={{asset("app/js/gijgo.min.js")}}></script>

<!--contact js-->
<script src={{asset("app/js/contact.js")}}></script>
<script src={{asset("app/js/jquery.ajaxchimp.min.js")}}></script>
<script src={{asset("app/js/jquery.form.js")}}></script>
<script src={{asset("app/js/jquery.validate.min.js")}}></script>
<script src={{asset("app/js/mail-script.js")}}></script>
<script src={{asset("app/js/main.js")}}></script>


</body>

</html>
