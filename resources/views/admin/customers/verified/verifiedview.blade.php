@extends('admin/layout')
@section('page_title','Verified Customers Details')
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
                                <li class="breadcrumb-item"><a href="{{url('admin/verifiedcustomer')}}">Verified Customers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
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
                                        <div class="input-view-box"><p>{{ $customer->authorizeshow->authorize_name }}</p></div>
                                       
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Business / Organization Name :</label>
                                        <div class="input-view-box"><p>{{ $customer->business }}</p></div>
                                 
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Category :</label>
                                        <div class="input-view-box"><p>{{ $customer->categoryshow->category_name  }}</p></div>
                 
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">First Name :</label>
                                        <div class="input-view-box"><p>{{ $customer->first_name  }}</p></div>
                                
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Middle Name :</label>
                                        <div class="input-view-box"><p>{{ $customer->middle_name  }}</p></div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Last Name :</label>
                                        <div class="input-view-box"><p>{{ $customer->last_name  }}</p></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mx-auto text-center">
                                            <h5 class="text-greenthemed">Permanent Address</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Province :</label>
                                        <div class="input-view-box"><p>{{ $customer->permanentState->province_name   }}</p></div>
                        
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">District :</label>
                                        <div class="input-view-box"><p>{{ $customer->permanentDistrict->district_name    }}</p></div>
                   
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Municipality / Palika :</label>
                                        <div class="input-view-box"><p>{{ $customer->permanentMunicipality->municipality_name   }}</p></div>
                                  
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Ward :</label>
                                        <div class="input-view-box"><p>{{ $customer->permanent_ward   }}</p></div>
                             
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Tole :</label>
                                        <div class="input-view-box"><p>{{ $customer->permanent_tole   }}</p></div>
                           
                                    </div>
                                    <div class="col-12">
                                        <div class="mx-auto text-center">
                                            <h5 class="text-greenthemed">Contact Information</h5>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Email address :</label>
                                        <div class="input-view-box"><p>{{ $customer->email   }}</p></div>
                                     
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Phone Number :</label>
                                        <div class="input-view-box"><p>{{ $customer->phone   }}</p></div>
                                     
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Cell :</label>
                                        <div class="input-view-box"><p>{{ $customer->cell  }}</p></div>
                                  
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Username :</label>
                                        <div class="input-view-box"><p>{{ $customer->user_name   }}</p></div>
                                    
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