
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nepal Restro </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}">
    @stack('before-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/typicons.font@2.1.0/dist/typicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/typicons.font@2.1.2/src/font/typicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.minn.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/jquery-ui.css') }}">

    @stack('after-styles')

</head>

<body>
    <nav class="nav-head position-relative ">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <a href="index.php" class="navbar-logo text-center"><img src="img/logo.png" class="img-fluid" alt=""></a>

            </div>
            <ul class="navbar-links">
                <li class="navbar-dropdown  pl-4">

                    <a class="menu-btn-large" href="#">
                        <div class="header-right-item  position-relative"><span></span></div>
                    </a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="side-bar-large p-5">
        <div class="side-bar-overlay"></div>
        <header>
            <div class="close-btn-large">
                <i class="fa fa-times"></i>
            </div>
        </header>

        <div class="side_menu_block ">

            <div class="menu_side mt-5">
                <ul>
                    <li><a href="index.php"><span>Home</span></a></li>
                    <li><a href="restaurant-list.php"><span>Restaurant / Bar</span></a></li>
                    <li>
                        <a class="collapse-heading collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span>Services</span>
                            <i class="fas fa-chevron-up"></i>
                        </a>
                        <ul class="collapse collapse-menu" id="collapseExample">
                            <li>
                                <a href="blog-detail.php"><span>Restaurant</span></a>
                            </li>
                            <li>
                                <a href="blog-detail.php"><span>Digital Menu</span></a>
                            </li>
                            <li>
                                <a href="blog-detail.php"><span>Photoshot</span></a>
                            </li>
                            <li>
                                <a href="blog-detail.php"><span>Event Management</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="about.php"><span>About</span></a></li>
                    <li><a href="blog.php"><span>Blog</span></a></li>
                    <li><a href="review.php"><span>Review</span></a></li>
                    <li><a href="contact.php"><span>Contact</span></a></li>
                </ul>
            </div>
            <div class="default-btn-wrapp mt-4 mb-4">
                <a href="#" class="btn_default w-100">login
                    <span>→</span>
                </a>
            </div>

            <div class="address-links position-relative mt-4">
                <h5>Connect with Us</h5>
                <ul>
                    <li><a><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Kumaripati-05, Lalitpur Metropolitan, Lalitpur ,Nepal</a>
                    </li>
                    <li><a href="tel:+977-1-4981327 "><span><i class="fa fa-volume-control-phone"
                                    aria-hidden="true"></i></span>+977-01-5453000, +977-9803030780 </a>
                    </li>

                    <li><a href="mailto:info@khojsansar.com">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            info@khojsansar.com</a>
                    </li>
                </ul>
            </div>
        </div>


    </div>
