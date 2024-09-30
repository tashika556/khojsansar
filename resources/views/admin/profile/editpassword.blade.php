@extends('admin/layout')
@section('page_title','Edit Profile')
@push("after-styles")
<link href="{{ asset('admin/libs/node-waves/waves.min.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('admin/libs/simplebar/simplebar.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/libs/%40simonwep/pickr/themes/nano.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/libs/%40tarekraafat/autocomplete.js/css/autoComplete.css') }}">
<link rel="stylesheet" href="{{ asset('admin/libs/choices.js/public/assets/styles/choices.min.css') }}">


@endpush
@section('container')





<div class="page">

    @include('admin.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">


            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">@yield('page_title')</h1>
                    <ol class="breadcrumb mb-0">

                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/profile')}}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                    </ol>
                </div>
                <div>


                </div>
            </div>

            <!-- Start:: row-2 -->
            <div class="row">
                <div class="col-xl-9">
                    <div class="tab-content" id="profile-tabs">
                        <div class="tab-pane show active p-0 border-0" id="profile-about-tab-pane" role="tabpanel"
                            aria-labelledby="profile-about-tab" tabindex="0">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush">


                                        <li class="list-group-item p-4">
                                            <span class="fw-medium fs-15 d-block mb-3">PERSONAL INFO :</span>
                                            <form action="{{ route('updatepasswords', $admin->id) }}" method="post">
                                            @csrf <div class="row gy-4 align-items-center">

                                                    <div class="col-xl-3">
                                                        <div class="lh-1">
                                                            <span class="fw-medium">Old Password :</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9">
                                                    <div class="form-box position-relative">
                                                <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="password"
                                                    required="">
                                                <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                                            </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <div class="lh-1">
                                                            <span class="fw-medium">New Password :</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9">
                                                    <div class="form-box position-relative">
                                                <input type="password" class="form-control" placeholder="New Password" name="password" id="passwords"
                                                    required="">
                                                <span class="password-toggle-icons"><i class="fas fa-eye"></i></span>
                                            </div>
                                                    </div>

                                                    <div class="col-xl-2">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </div>
                                                    @include('admin.auth.error')
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                class="text-dark fw-medium">KhojSansar</a>.
            Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);"
                target="_blank">
                <span class="fw-medium text-primary">Digisoft Developers</span>
            </a> All
            rights
            reserved
        </span>
    </div>
</footer>


</div>

<div class="scrollToTop">
    <span class="arrow lh-1"><i class="ti ti-caret-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
</div>


@endsection
@push("after-scripts")
<script src="{{ asset('admin/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/libs/%40popperjs/core/umd/popper.min.js')}}"></script>

<script src="{{ asset('admin/libs/node-waves/waves.min.js')}}"></script>

<!-- SIMPLEBAR JS -->
<script src="{{ asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('admin/js/simplebar.js')}}"></script>

<!-- PICKER JS -->
<script src="{{ asset('admin/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('admin/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>

<!-- AUTO COMPLETE JS -->
<script src="{{ asset('admin/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js')}}"></script>

<!-- Apex Charts JS -->
<script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Sales Dashboard -->
<script src="{{ asset('admin/js/sales-dashboard.js')}}"></script>


<!-- STICKY JS -->
<script src="{{ asset('admin/js/sticky.js')}}"></script>

<!-- DEFAULTMENU JS -->
<script src="{{ asset('admin/js/defaultmenu.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('admin/js/custom.js')}}"></script>

<!-- CUSTOM-SWITCHER JS -->
<script src="{{ asset('admin/js/custom-switcher.js')}}"></script>
<script>


    let oldPasswordInput = document.getElementById("password");
    let oldPasswordToggle = document.querySelector(".password-toggle-icon i");

    if (oldPasswordToggle) {
        oldPasswordToggle.addEventListener("click", function () {
            if (oldPasswordInput.type === "password") {
                oldPasswordInput.type = "text";
                oldPasswordToggle.classList.remove("fa-eye");
                oldPasswordToggle.classList.add("fa-eye-slash");
            } else {
                oldPasswordInput.type = "password";
                oldPasswordToggle.classList.remove("fa-eye-slash");
                oldPasswordToggle.classList.add("fa-eye");
            }
        });
    }

    let newPasswordInput = document.getElementById("passwords");
    let newPasswordToggle = document.querySelector(".password-toggle-icons i");

    if (newPasswordToggle) {
        newPasswordToggle.addEventListener("click", function () {
            if (newPasswordInput.type === "password") {
                newPasswordInput.type = "text";
                newPasswordToggle.classList.remove("fa-eye");
                newPasswordToggle.classList.add("fa-eye-slash");
            } else {
                newPasswordInput.type = "password";
                newPasswordToggle.classList.remove("fa-eye-slash");
                newPasswordToggle.classList.add("fa-eye");
            }
        });
    }


</script>
@endpush