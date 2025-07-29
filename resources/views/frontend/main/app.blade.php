<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content name="keywords">
    <meta content name="description">

    <link href="img/favicon.html" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&amp;family=Montserrat:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link href="{{asset('frontendCssJs/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('frontendCssJs/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css')}}"
          rel="stylesheet">

    <link href="{{asset('frontendCssJs/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontendCssJs/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontendCssJs/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('frontendCssJs/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('frontendCssJs/css/style.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="container-xxl bg-white p-0">

    <div id="spinner"
         class="show bg-white position-fixed translate-middle
         w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="/"
                   class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 bg-white d-none d-lg-flex">
                    <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <p class="mb-0">
                                <a href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection"
                                   class="__cf_email__" data-cfemail="ef86818980af8a978e829f838ac18c8082">
                                    [email&#160;protected]
                                </a>
                            </p>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <p class="mb-0">+012 345 6789</p>
                        </div>
                    </div>
                    <div class="col-lg-5 px-5 text-end">
                        <div class="d-inline-flex align-items-center py-2">
                            <a class="me-3" href="{{route('setLocale','az')}}">
                                <img style="width: 20px; height: 15px"
                                     src="{{asset('frontendCssJs/img/flags/az.svg')}}">
                            </a>
                            <a class="me-3" href="{{route('setLocale','en')}}">
                                <img style="width: 20px; height: 15px"
                                     src="{{asset('frontendCssJs/img/flags/en.svg')}}">
                            </a>
                            <a class="me-3" href="{{route('setLocale','ru')}}">
                                <img style="width: 20px; height: 15px"
                                     src="{{asset('frontendCssJs/img/flags/ru.svg')}}">
                            </a>
                            <a class="me-3" href><i class="fab fa-facebook-f"></i></a>
                            <a class="me-3" href><i class="fab fa-twitter"></i></a>
                            <a class="me-3" href><i class="fab fa-linkedin-in"></i></a>
                            <a class="me-3" href><i class="fab fa-instagram"></i></a>
                            <a class href><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                    <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @foreach($menus as $menu)
                                <a href="{{url($menu->url)}}" class="nav-item nav-link">
                                    @if(App::getLocale()=='az')
                                        {{$menu->name_az}}
                                    @elseif(App::getLocale()=='en')
                                        {{$menu->name_en}}
                                    @elseif(App::getLocale()=='ru')
                                        {{$menu->name_ru}}
                                    @endif
                                </a>
                            @endforeach
                        </div>
                        <a href="https://htmlcodex.com/hotel-html-template-pro"
                           class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">
                            Purchase Now
                            <i class="fa fa-arrow-right ms-3"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-primary rounded p-4">
                        <a href="index.html"><h1 class="text-white text-uppercase mb-3">Hotelier</h1></a>
                        <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                            diam amet diam et eos. Clita erat ipsum</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><a
                            href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection" class="__cf_email__"
                            data-cfemail="41282f272e012439202c312d246f222e2c">[email&#160;protected]</a></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row gy-5 g-4">
                        <div class="col-md-6">
                            <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                            <a class="btn btn-link" href>About Us</a>
                            <a class="btn btn-link" href>Contact Us</a>
                            <a class="btn btn-link" href>Privacy Policy</a>
                            <a class="btn btn-link" href>Terms & Condition</a>
                            <a class="btn btn-link" href>Support</a>
                        </div>
                        <div class="col-md-6">
                            <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                            <a class="btn btn-link" href>Food & Restaurant</a>
                            <a class="btn btn-link" href>Spa & Fitness</a>
                            <a class="btn btn-link" href>Sports & Gaming</a>
                            <a class="btn btn-link" href>Event & Party</a>
                            <a class="btn btn-link" href>GYM & Yoga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. Designed By <a
                            class="border-bottom" href="https://htmlcodex.com/">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href>Home</a>
                            <a href>Cookies</a>
                            <a href>Help</a>
                            <a href>FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script src="{{asset('frontendCssJs/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('frontendCssJs/code.jquery.com/jquery-3.4.1.min.js')}}"></script>
<script
    src="{{asset('frontendCssJs/cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/rating/rating.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('frontendCssJs/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('frontendCssJs/js/main.js')}}"></script>
<script src="{{asset('frontendCssJs/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"></script>
@yield('js')
</body>
</html>
