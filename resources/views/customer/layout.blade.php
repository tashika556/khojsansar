<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.minn.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <section class="top_header bg-red-themed p-xl-0 p-3 w-100 position-relative">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-2 col-2">
                    <div class="logo"><a href="{{url('customerhome')}}"><img
                                src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" alt="logo1"
                                class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-xl-2 col-2 d-xl-block d-none ">
                    <div class="mt-3">
                        <p class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> {{ $contact->phone_one }}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-4 d-xl-block d-none ">
                    <div class="mt-3 d-flex">
                        <p class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contact->address_one }}</p>
                     
                    </div>
                </div>
                <div class="col-lg-2 col-2 d-xl-block d-none ">
                    <div class="mt-3 d-flex justify-content-evenly">
                        <a class="text-white" target="_blank" href="{{ $contact->facebook_url }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->twitter_url }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->instagram_url }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->youtube_url }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hamburger-init">
                        <span class="bar top-bar"></span>
                        <span class="bar middle-bar"></span>
                        <span class="bar bottom-bar"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="menu-wrapper">
        <ul class="menu">
            <li><a href="{{url('aboutcustomer')}}">About</a></li>
            <li><a href="{{url('contactcustomer')}}">Contact</a></li>
            <li><a href="{{url('reviewcustomer')}}">Review</a></li>
            <li><a href="{{url('customerchangepassword')}}">Change Password</a></li>

<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a><form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
    @csrf
</form></li>
        </ul>
    </div>

    @section('container')
    @show
    <section class="contact-area">

<div class="footer-overlay"></div>
<div class="container">
    <div class="footer-top-area">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Contact Us</h5>
                    <p><a href="tel:{{ $contact->phone_one }}">{{ $contact->phone_one }}</a></p>
                    <p><a href="tel:{{ $contact->phone_two }}">{{ $contact->phone_two }}</a></p>
                    <p><a href="mailto:{{ $contact->email_one }}">{{ $contact->email_one }}</a></p>
                    <div class="contact-social d-flex justify-content-center pt-3">
                        <ul>
                            <li><a class="hover-target" target="_blank" href="{{ $contact->facebook_url }}"><i
                                        class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" target="_blank" href="{{ $contact->twitter_url }}"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" target="_blank" href="{{ $contact->instagram_url }}"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" target="_blank" href="{{ $contact->youtube_url }}"><i
                                        class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Address</h5>
                    <p>{{ $contact->address_one }} <br> {{ $contact->address_two }}</p>
                </div>
            </div>


            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Opening Hours</h5>
                    <p>Everyday : {{ $contact->opening_hours }}</p>

                    <div class="pt-3">
                        <p class="text-center text-white pb-1">We Accept</p>

                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset('frontend/img/accepts.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="footer-bottom-area">

    <div class="footer-bottom-middle footer-px">
        <a href="{{url('customerhome')}}">
            <img src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" alt="">
        </a>
    </div>
    <div class="footer-bottom-down footer-px py-2">
        <div class="d-flex justify-content-between">
            <div class="footer-bottom-down-left">
                <p>Copyright © {{ date('Y') }} {{ $sitesetting->site_title }}.</p>
            </div>
            <div class="footer-bottom-down-right">
                <p>Website by: <a href="https://archiesoft.com.np/" target="_blank">ArchieSoft Technology</a>
                </p>
            </div>
        </div>
    </div>
</div>

</section>

    <script src="{{asset('customer/js/font-awesom.js')}} "></script>
    <script src="{{asset('customer/js/jquery-3.6.4.min.js')}} "></script>
    <script src="{{asset('customer/js/main.js')}} "></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    @stack('after-scripts')
</body>

</html>