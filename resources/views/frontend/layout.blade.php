<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('page_title')</title>
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />


    @stack('after-styles')

</head>

<body>
    <nav class="nav-head position-relative ">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <a href="{{url('')}}" class="navbar-logo text-center"><img
                        src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" class="img-fluid" alt=""></a>

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

    <div class="side-bar-large py-5 pl-5 pr-3">
        <div class="side-bar-overlay"></div>
        <header>
            <div class="close-btn-large">
                <i class="fa fa-times"></i>
            </div>
        </header>

        <div class="side_menu_block ">

            <div class="menu_side mt-5">
                <ul>
                    <li><a href="{{url('')}}"><span>Home</span></a></li>
                    <li><a href="{{url('restaurantall-list')}}"><span>Restaurant / Bar</span></a></li>
                    <li>
                        <a class="collapse-heading collapsed" data-toggle="collapse" href="#collapseExample"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span>Services</span>
                            <i class="fas fa-chevron-up"></i>
                        </a>
                        <ul class="collapse collapse-menu" id="collapseExample">

                            @foreach($khojsansarservice as $index => $cat)
                            <li>
                                <a href="{{ route('service.details', $cat->id) }}"><span>{{ $cat->title }}</span></a>
                            </li>

                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('aboutview')}}"><span>About</span></a></li>
                    <li><a href="{{url('blogview')}}"><span>Blog</span></a></li>
                    <li><a href="{{url('testimonialview')}}"><span>Testimonial</span></a></li>
                    <li><a href="{{url('contact')}}"><span>Contact</span></a></li>
                </ul>
            </div>
            <div class="default-btn-wrapp mt-4 mb-4">
                <a href="{{url('customerlogin')}}" target="_blank" class="btn_default w-100">login
                    <span>→</span>
                </a>
            </div>

            <div class="address-links position-relative mt-4">
                <h5>Connect with Us</h5>
                <ul>
                    <li><a><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>{{ $contact->address_one }},
                            {{ $contact->address_two }}</a>
                    </li>
                    <li><a href="tel:{{ $contact->phone_one }} "><span><i class="fa fa-volume-control-phone"
                                    aria-hidden="true"></i></span>{{ $contact->phone_one }} </a>
                        <a href="tel:{{ $contact->phone_two }} " class="mt-0"><span></span>, {{$contact->phone_two}}</a>
                    </li>

                    <li><a href=" {{ $contact->email_one }}">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            {{ $contact->email_one }}</a><a href=" {{ $contact->email_two }}" class="mt-0">
                            <span></span>
                            {{ $contact->email_two }}</a>
                    </li>
                </ul>
            </div>
        </div>


    </div>


    @section('container')
    @show




    <a id="button">Go To Top</a>




    <section class="contact-area">

        <div class="footer-overlay"></div>
        <div class="container">
            <div class="footer-top-area">
                <div class="row">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        <div class="footer-top-area-item text-center">
                            <h5>Address</h5>
                            <p>{{ $contact->address_one }} <br> {{ $contact->address_two }}</p>
                        </div>
                        <div class="footer-khoj-app d-flex justify-content-center align-items-center mt-3">
                            <a href="#">
                                <img src="{{ URL::asset('frontend/img/playstore.png') }}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ URL::asset('frontend/img/applestore.png') }}" alt="">
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4">
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

            <div class="footer-bottom-middle footer-px md:mb-0 mb-4">
                <a href="{{url('')}}">
                    <img src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" alt="">
                </a>
            </div>
            <div class="footer-bottom-down footer-px py-2">
                <div class="d-sm-flex d-block justify-content-between">
                    <div class="footer-bottom-down-left text-center">
                        <p>Copyright © {{ date('Y') }} {{ $sitesetting->site_title }}.</p>
                    </div>
                    <div class="footer-bottom-down-right text-center">
                        <p>Website by: <a href="https://archiesoft.com.np/" target="_blank">ArchieSoft Technology</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
    @stack('before-scripts')
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('{{ config('services.recaptcha_v3.key') }}', {action: 'submit'}).then(function (token) {
            document.getElementById('recaptcha_token').value = token;
        });
    });
</script>
    <script src="{{ URL::asset('frontend/js/jquery-1.12.4.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <script type="text/javascript" src="{{asset('frontend/js/nepal-province.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/all-districts.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

    <script type="text/javascript" src="{{ URL::asset('frontend/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('frontend/js/slick.js')}}"></script>
    <script src="{{ URL::asset('frontend/js/slick-animation.min.js')}}"></script>
    <script src="{{ URL::asset('frontend/js/wow.js')}}"></script>
    <script src="{{ URL::asset('frontend/js/font-awesom.js')}} "></script>
    <script src="{{ URL::asset('frontend/js/typed.min.js')}}"
        integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.js"></script>



    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha_v3.key') }}"></script>
        <script src="{{ URL::asset('frontend/js/main.js')}}"></script>
 
    <script>
         $(document).ready(function () {
        $('.popup-video').magnificPopup({
            type: 'iframe'
        });
    });
    $(document).ready(function() {
        $('#province').on('change', function() {
            var provinceId = $(this).val();
            $("#district").prop('disabled', false).html('');

            $.ajax({
                url: "{{ url('/getDistrict') }}",
                type: "POST",
                data: {
                    province_id: provinceId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#district').html('<option value="">Select District</option>');
                    $.each(res.districts, function(key, value) {
                        $("#district").append('<option value="' + value.id + '">' +
                            value.district_name + '</option>');
                    });
                }
            });
        });

        $('#district').on('change', function() {
            var districtId = $(this).val();
            $("#municipality").prop('disabled', false).html(
                '');
            $.ajax({
                url: "{{ url('/getMunicipality') }}",
                type: "POST",
                data: {
                    district_id: districtId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $("#municipality").html(
                        '<option value="">Select Municipality</option>');
                    $.each(res.municipalities, function(key, value) {
                        $("#municipality").append('<option value="' + value.id +
                            '">' + value.municipality_name + '</option>');
                    });

                }
            });
        });
        $('#municipality').on('change', function() {
            var municipalityId = $(this).val();
            $("#category").prop('disabled', false).html('');
            $.ajax({
                url: "{{ url('/getCategories') }}",
                type: "POST",
                data: {
                    municipality_id: municipalityId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $("#category").html('<option value="">Select Category</option>');
                    $.each(res.categories, function(key, value) {
                        $("#category").append('<option value="' + value.id + '">' +
                            value.category_name + '</option>');
                    });
                }
            });
        });

        $('#search-button').on('click', function(e) {
            e.preventDefault();

            var state = $('select[name="state"]').val();
            var district = $('select[name="district"]').val();
            var municipality = $('select[name="municipality"]').val();
            var category = $('select[name="category"]').val();

            var requiredFields = [state, district, municipality, category];
            var isValid = requiredFields.every(field => field !== "");

            if (!isValid) {
                alert('Please enter all required details.');
                return;
            }

            var categoryId = $('#category').val();
            var municipalityId = $('#municipality').val();

            $('#category_id').val(categoryId);
            $('#municipality_id').val(municipalityId);

            $('#search-form').submit();
        });

        function filterByCategory() {
            const categoryId = document.getElementById('category-list').value;
            const districtId = "{{ isset($districtId) ? $districtId : request()->input('district_id') }}";
            const municipalityId =
                "{{ isset($municipalityId) ? $municipalityId : request()->input('municipality_id') }}";
            window.location.href = `?category_id=${categoryId}&district_id=${districtId}`;
            window.location.href = `?category_id=${categoryId}&municipality_id=${municipalityId}`;
        }

        document.getElementById('category-list').addEventListener('change', function() {
            filterByCategory();
        });


        $('#search-input').on('input', function() {
            let searchQuery = $(this).val();
            let filterForm = $('#filter-form');

            $.ajax({
                url: filterForm.attr('action'),
                method: 'GET',
                data: filterForm.serialize() + '&search=' + searchQuery,
                success: function(response) {
                    $('#restaurant-list').html(response.html);
                    $('.pagination').html(response.pagination);
                }
            });
        });

        $('#category-list').change(function() {
            $('#filter-form').submit();
        });


    });

    document.getElementById('items-per-page-select').addEventListener('change', function() {
        let perPage = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        window.location.href = url.toString();
    });

    </script>
    @stack('after-scripts')


</body>

</html>