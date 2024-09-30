<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css') }}" />
</head>

<body>
    <section class="top_header bg-red-themed p-xl-0 p-3 w-100 position-relative">
        <div class="container p-1 pb-2">
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
                        <p class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> {{ $contact->phone_one }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-4 d-xl-block d-none ">
                    <div class="mt-3 d-flex">
                        <p class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ $contact->address_one }}</p>

                    </div>
                </div>
                <div class="col-lg-2 col-2 d-xl-block d-none ">
                    <div class="mt-3 d-flex justify-content-evenly">
                        <a class="text-white" target="_blank" href="{{ $contact->facebook_url }}"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->twitter_url }}"><i
                                class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->instagram_url }}"><i
                                class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{ $contact->youtube_url }}"><i
                                class="fa fa-youtube" aria-hidden="true"></i></a>
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
            <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <section class="form-sections padding-section position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-boxes">
                        <div class="row">

                            <div class="col-xl-2 col-md-4 col-12">
                                <a href="{{ route('customerhome') }}"
                                    class="@yield('personalactive_class') info-box mx-auto text-center mb-4">Personal</a>
                            </div>
                            <div class="col-xl-1 col-md-4 col-12">
                                <a href="{{ route('businessview') }}"
                                    class="{{ session('personalFormCompleted') ? '' : 'disabled' }} @yield('businessactive_class') info-box mx-auto text-center mb-4">
                                    Business</a>
                            </div>

                            <div class="col-xl-1 col-md-4 col-12">
                                <a href="{{ $business ? route('businessserviceview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessFormCompleted') ? '' : 'disabled' }} @yield('serviceactive_class') info-box mx-auto text-center mb-4">
                                    Services
                                </a>
                            </div>
                            <div class="col-xl-1 col-md-4 col-12">
                                <a href="{{ $business ? route('businessfacilityview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessServicesCompleted') ? '' : 'disabled' }} @yield('facilityactive_class') info-box mx-auto text-center mb-4">
                                    Facility</a>
                            </div>
                            <div class="col-xl-1 col-md-4 col-12">
                                <a href="{{ $business ? route('businessmenuview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessFacilityCompleted') ? '' : 'disabled' }} @yield('menuactive_class') info-box mx-auto text-center mb-4">
                                    Menu</a>
                            </div>
                            <div class="col-xl-2 col-md-4 col-12">
                                <a href="{{ $business ? route('businessspecialview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessMenuCompleted') ? '' : 'disabled' }} @yield('specialactive_class') info-box mx-auto text-center mb-4">
                                    Special</a>
                            </div>
                            <div class="col-xl-2 col-md-4 col-12">
                                <a href="{{ $business ? route('businessphotosvideosview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessSpecialCompleted') ? '' : 'disabled' }} @yield('photosactive_class') info-box mx-auto text-center mb-4">
                                    Photos & Videos</a>
                            </div>
                            <div class="col-xl-2 col-md-4 col-12">
                                <a href="{{ $business ? route('paymentview', ['id' => $business->customer]) : '#' }}"
                                    class="{{ session('businessphotos') ? '' : 'disabled' }} @yield('paymentactive_class') info-box mx-auto text-center mb-4">
                                    Payment</a>
                            </div>

                            <div class="img-popup">
                                <img src="" alt="Popup Image">
                                <div class="close-btn">
                                    <div class="bar"></div>
                                    <div class="bar"></div>
                                </div>
                            </div>
                            @section('container')
                            @show
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                <a href="{{url('')}}">
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
    @stack('before-scripts')
    <script src="{{asset('customer/js/font-awesom.js')}} "></script>
    <script src="{{asset('customer/js/jquery-3.6.4.min.js')}} "></script>
    <script src="{{asset('customer/js/main.js')}} "></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#province').on('change', function() {
            var idpradesh = this.value;
            $("#district").html('');
            $.ajax({
                url: "{{url('/getDistrict')}}",
                type: "POST",
                data: {
                    province_id: idpradesh,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#district').html(' <option value="">Select District-</option>>');
                    $.each(res.districts, function(key, value) {
                        $("#district").append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });


                }
            });
        });
        $('#district').on('change', function() {
            var idDistrict = this.value;
            $("#municipality").html('');
            $.ajax({
                url: "{{url('/getMunicipality')}}",
                type: "POST",
                data: {
                    district_id: idDistrict,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#municipality').html(
                        '<option value="">Select Palika:-</option>');
                    $.each(result.municipalities, function(key, value) {
                        $("#municipality").append('<option value="' + value
                            .id + '">' + value.municipality_name + '</option>');
                    });
                }
            });
        });
        $('#provinces').on('change', function() {
            var idpradesh = this.value;
            $("#districts").html('');
            $.ajax({
                url: "{{url('/getDistrict')}}",
                type: "POST",
                data: {
                    province_id: idpradesh,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#districts').html(' <option value="">Select District-</option>>');
                    $.each(res.districts, function(key, value) {
                        $("#districts").append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });


                }
            });
        });
        $('#districts').on('change', function() {
            var idDistrict = this.value;
            $("#municipalitys").html('');
            $.ajax({
                url: "{{url('/getMunicipality')}}",
                type: "POST",
                data: {
                    district_id: idDistrict,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#municipalitys').html(
                        '<option value="">Select Palika:-</option>');
                    $.each(result.municipalities, function(key, value) {
                        $("#municipalitys").append('<option value="' + value
                            .id + '">' + value.municipality_name + '</option>');
                    });
                }
            });
        });
    });
    document.getElementById('change-province').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('province-input').style.display = 'none';
        document.getElementById('province').style.display = 'block';
        this.style.display = 'none';
    });
    document.getElementById('change-openingdays').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('change-openingdays-input').style.display = 'none';
        document.getElementById('opening_total_days').style.display = 'block';
        this.style.display = 'none';
    });
    document.getElementById('change-openinghours').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('change-openinghours-input').style.display = 'none';
        document.getElementById('opening_total_hours').style.display = 'block';
        this.style.display = 'none';
    });
    document.getElementById('change-district').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('district-input').style.display = 'none';
        document.getElementById('district').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('change-municipality').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('municipality-input').style.display = 'none';
        document.getElementById('municipality').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('change-temp-province').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('temp-province-input').style.display = 'none';
        document.getElementById('provinces').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('change-temp-district').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('temp-district-input').style.display = 'none';
        document.getElementById('districts').style.display = 'block';
        this.style.display = 'none';
    });
    document.getElementById('change-temp-muni').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('temp-muni-input').style.display = 'none';
        document.getElementById('municipalitys').style.display = 'block';
        this.style.display = 'none';
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('add-item')) {
                let menuId = e.target.getAttribute('data-menu-id');
                let menuItemsContainer = document.querySelector(
                    `.menu-items[data-menu-id="${menuId}"]`);

                let menuItemCount = menuItemsContainer.querySelectorAll('.menu-item').length;


                let newMenuItem = menuItemsContainer.querySelector('.menu-item').cloneNode(true);


                newMenuItem.querySelectorAll('input, textarea').forEach(input => input.value = '');


                newMenuItem.querySelectorAll('input, textarea').forEach(input => {
                    input.id = input.id.replace(/\d+$/, menuItemCount + 1);
                    input.name = input.name.replace(/\d+$/, menuItemCount + 1);
                });


                menuItemsContainer.appendChild(newMenuItem);
            }
        });
    });
    </script>
    @stack('after-scripts')
</body>

</html>