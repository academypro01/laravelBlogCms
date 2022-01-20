<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    @yield('metaTags')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('front/css/all.css')}}">
    <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" />

</head>

<body>
<div class="container-scroller">
    <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-top">
                        <div class="d-flex justify-content-between align-items-center">

                            <ul class="navbar-top-right-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link">Dashboard</a>
                                </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="{{route('login')}}" class="nav-link">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('register')}}" class="nav-link">Sign up</a>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a class="navbar-brand" href="#"
                                ><img src="{{asset('front/assets/images/logo.svg')}}" alt=""
                                    /></a>
                            </div>
                            <div>
                                <button
                                    class="navbar-toggler"
                                    type="button"
                                    data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation"
                                >
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div
                                    class="navbar-collapse justify-content-center collapse"
                                    id="navbarSupportedContent"
                                >
                                    <ul
                                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                                    >
                                        <li>
                                            <button class="navbar-close">
                                                <i class="mdi mdi-close"></i>
                                            </button>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{route('front.home')}}">Home</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- partial -->

        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-sm-flex justify-content-center align-items-center">
                                <h4 class="text-center">CopyRight {{date('Y')}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- partial -->
    </div>
</div>
<script src="{{asset('front/js/all.js')}}"></script>
</body>
</html>
