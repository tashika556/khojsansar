<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/style.css')}}">
</head>

<body>
    <section class="top_header bg-red-themed p-xl-0 p-3 w-100 position-relative">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-2 col-2">
                    <div class="logo"><a href="index.php"><img
                                src="{{ URL::asset('admin/images/brand-logos/digi-logo.png')}}" alt="logo1"
                                class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-xl-2 col-2 d-xl-block d-none ">
                    <div class="mt-3">
                        <p class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> 01-5553000</p>
                    </div>
                </div>
                <div class="col-xl-3 col-4 d-xl-block d-none ">
                    <div class="mt-3 d-flex">
                        <p class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> Kumaripati - 5
                            Lalitpur Metropolitan</p>

                    </div>
                </div>
                <div class="col-lg-2 col-2 d-xl-block d-none ">
                    <div class="mt-3 d-flex justify-content-evenly">
                        <p class="text-white"><i class="fa fa-facebook" aria-hidden="true"></i></p>
                        <p class="text-white"><i class="fa fa-twitter" aria-hidden="true"></i></p>
                        <p class="text-white"><i class="fa fa-instagram" aria-hidden="true"></i></p>
                        <p class="text-white"><i class="fa fa-youtube" aria-hidden="true"></i></p>
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
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">Review</a></li>
            <li><a href="contact.php">Logout</a></li>
        </ul>
    </div>

    <section class="form-sections padding-section position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-boxes">
                    <div class="row">
              
                    <div class="col-xl-2 col-md-4 col-12">
                            <div class="@yield('personalactive_class') info-box mb-4">
                                <div class="mx-auto text-center mb-4">
                                    <p>Personal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-12">
                       
                            <div class="@yield('businessactive_class') info-box mx-auto text-center mb-4">
                                <p>Business</p>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-4 col-12">
                            <div class="@yield('serviceactive_class') info-box mx-auto text-center mb-4">
                                <p>Services</p>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-4 col-12">
                            <div class="@yield('facilityactive_class') info-box mx-auto text-center mb-4">
                                <p>Facility</p>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-4 col-12">
                            <div class="@yield('menuactive_class') info-box mx-auto text-center mb-4">
                                <p>Menu</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-12">
                            <div class="@yield('specialactive_class') info-box mx-auto text-center mb-4">
                                <p>Special</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-12">
                            <div class="@yield('photosactive_class') info-box mx-auto text-center mb-4">
                                <p>Photos & Videos</p>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-4 col-12">
                            <div class="@yield('paymentactive_class') info-box mx-auto text-center mb-4">
                                <p>Payment</p>
                            </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('add-item')) {
                    let menuId = e.target.getAttribute('data-menu-id');
                    let menuItemsContainer = document.querySelector(`.menu-items[data-menu-id="${menuId}"]`);
 
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