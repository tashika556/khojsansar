@extends('admin/layout')
@section('page_title','Not Approved Business Details')
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

            <!-- Page Header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">@yield('page_title')</h1>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{url('admin/notapprovedbusiness')}}">Not Approved Business</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header bg-yellow-themed text-fixed-white">
                            <div class="card-title">
                                @yield('page_title')
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <div class="mx-auto text-center">
                                        <h5 class="text-greenthemed">Basic Information</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Authorize :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->customershow->authorizeshow->authorize_name }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Business / Organization Name :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->customershow->business }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Category :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->customershow->categoryshow->category_name  }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Customer Name :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->customershow->first_name  }}
                                            {{ $business->customershow->middle_name  }}
                                            {{ $business->customershow->last_name  }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">How many days a week is your business
                                        open ? :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->opening_total_days }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">How many hours is your business open in
                                        a day ? :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->opening_total_hours}}</p>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="input-label" class="form-label">Logo :</label>
                                    <div class="container__img-holder ">
                                        <img src="{{ asset('uploads/businesslogo/' . $business->logo) }}"
                                            style="height:100px; width:100px;" alt="Logo">
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="input-label" class="form-label">Cover Image :</label>
                                    <div class="container__img-holder ">
                                        <img src="{{ asset('uploads/businesscoverimage/'.$business->coverimage) }}"
                                            style="height:100px; width:100px;" alt="Logo">
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="mx-auto text-center">
                                        <h5 class="text-greenthemed">Address Information</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">State :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->stateshow->province_name }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">District :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->districtshow->district_name }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Municipality :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->municipalityshow->municipality_name  }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Ward :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->ward }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Tole :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->tole }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Address :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->address }}</p>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="input-label" class="form-label">Latitude :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->latitude }}</p>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="input-label" class="form-label">Longitude :</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->longitude }}</p>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="mx-auto text-center">
                                        <h5 class="text-greenthemed">Contact Information</h5>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-md-4 col-12">
                                    <label for="input-label" class="form-label">Email address One:</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->email_one   }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-2 col-md-4 col-12">
                                    <label for="input-label" class="form-label">Email address Two:</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->email_two  }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Phone Number One:</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->phone_one   }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Phone Number Two:</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->phone_two   }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Website URL:</label>
                                    <div class="input-view-box">
                                        <p>{{ $business->website_url   }}</p>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="mx-auto text-center">
                                        <h5 class="text-greenthemed">Payment Information</h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Payment Done:</label>
                                    <div class="input-view-box">
                                        <p> {{ $business->payment->payment_confirmation ? 'Yes' : 'No' }}</p>
                                    </div>

                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Admin Verified ? :</label>
                                    <div class="input-view-box">
                                        <p> {{ $business->payment->admin_confirmation ? 'Yes' : 'No' }}</p>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="input-label" class="form-label">Payment Receipt :</label>
                                    <div class="container__img-holder ">
                                        <img src="{{ asset('uploads/payment_receipt/' . $business->payment->payment_receipt) }}"
                                            style="height:100px; width:100px;" alt="Logo">
                                    </div>

                                </div> <td></td>
                                <div class="col-12">
                                    <div class="mx-auto text-center">
                                        <h5 class="text-greenthemed">Not Approved Reason</h5>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <label for="input-label" class="form-label">Admin Verified ? :</label>
                                    <div class="input-view-box text-area-box">
                                        <p>{{ $business->payment->rejection_reason ?? 'N/A' }}</p>
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

@endpush