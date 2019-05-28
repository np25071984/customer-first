<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Бренды <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О компании</a>
                    </li>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="page-footer font-small mdb-color pt-4">

            <!-- Footer Links -->
            <div class="container text-center text-md-left">

                <!-- Footer links -->
                <div class="row text-center text-md-left mt-3 pb-3">

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                        <p>
                            <a href="#!">Your Account</a>
                        </p>
                        <p>
                            <a href="#!">Become an Affiliate</a>
                        </p>
                        <p>
                            <a href="#!">Shipping Rates</a>
                        </p>
                        <p>
                            <a href="#!">Help</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Контакты</h6>
                        <p>
                            <i class="fas fa-home mr-3"></i> г.Москва, ул.Карауловая 17, оф.3</p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> info@customer-first.test</p>
                        <p>
                            <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p>
                            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Footer links -->

                <hr />

                <!-- Grid row -->
                <div class="row d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8">

                        <!--Copyright-->
                        <p class="text-center text-md-left">© 2019 Copyright:
                            <a href="/">
                                <strong> CustomerFirst</strong>
                            </a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0">

                        <!-- Social buttons -->
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

        </footer>
        <!-- Footer -->
    </div>
</body>
</html>
