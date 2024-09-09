<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Nepal Restro </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}">
    @stack('before-styles')
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.minn.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slick.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    @stack('after-styles')
</head>
<body>
    <nav class="nav navbar position-relative ">
        <div class="container-fluid">
            <a href="{{url('/')}}" class="navbar-logo text-center"><img src="{{ URL::asset('frontend/img/logo.png')}}" class="img-fluid" alt=""></a>
            <ul class="navbar-links">



                <li class="navbar-dropdown  pl-4">

                    <a class="menu-btn-large" href="#">
                        <div class="header-right-item  position-relative"><span></span></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="side-bar-large bg-white p-5 bg_img dark_bg">
        <header>
            <div class="close-btn-large">
                <i class="fa fa-times"></i>
            </div>
        </header>

        <div class="side_menu_block ">

            <div class="menu_side mt-5">
                <ul>
                    <li><a class="active" href="{{url('/')}}">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="restaurant-list.php">Restaurant</a></li>
                    <li><a href="digital-menu.php">Digital Menu</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                </ul>
            </div>

            <div class="address-links position-relative mt-5">
                <h5>OUR LOCATION</h5>
                <ul>
                    <li><a><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Kathmandu Nepal</a>
                    </li>
                    <li><a href="tel:+977-1-4981327 "><span><i class="fa fa-volume-control-phone"
                                    aria-hidden="true"></i></span> 01-5553000 </a>
                    </li>

                    <li><a href="mailto:digisoftdev@gmail.com">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            digisoftdev@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
