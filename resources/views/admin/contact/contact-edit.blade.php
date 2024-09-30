@extends('admin/layout')
@section('page_title','Edit Contact')
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
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{url('admin/contact')}}">Contact</a></li>
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
                        <form action="{{ route('updatecontact', $contact->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Address One<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" name="address_one" value="{{ $contact->address_one }}"
                                            class="form-control" id="input-label" placeholder="Enter Address One">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Address Two :</label>
                                        <input type="text" name="address_two" value="{{ $contact->address_two }}"
                                            class="form-control" id="input-label" placeholder="Enter Address Two">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Email One<span
                                                class="text-danger">*</span> :</label>
                                        <input type="email" name="email_one" value="{{ $contact->email_one }}"
                                            class="form-control" id="input-label" placeholder="Enter Email One">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Email Two :</label>
                                        <input type="email" name="email_two" value="{{ $contact->email_two }}"
                                            class="form-control" id="input-label" placeholder="Enter Email Two">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Phone One<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" name="phone_one" value="{{ $contact->phone_one }}"
                                            class="form-control" id="input-label" placeholder="Enter Phone One">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Phone Two :</label>
                                        <input type="text" name="phone_two" value="{{ $contact->phone_two }}"
                                            class="form-control" id="input-label" placeholder="Enter Phone Two">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Facebook URL :</label>
                                        <input type="text" name="facebook_url" value="{{ $contact->facebook_url }}"
                                            class="form-control" id="input-label" placeholder="Enter Facebook URL">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Twitter URL :</label>
                                        <input type="text" name="twitter_url" value="{{ $contact->twitter_url }}"
                                            class="form-control" id="input-label" placeholder="Enter Twitter URL">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Instagram URL :</label>
                                        <input type="text" name="instagram_url" value="{{ $contact->instagram_url }}"
                                            class="form-control" id="input-label" placeholder="Enter Instagram URL">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Youtube URL :</label>
                                        <input type="text" name="youtube_url" value="{{ $contact->youtube_url }}"
                                            class="form-control" id="input-label" placeholder="Enter Youtube URL">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Opening Hours :</label>
                                        <input type="text" name="opening_hours" value="{{ $contact->opening_hours }}"
                                            class="form-control" id="input-label" placeholder="Enter Opening Hours">
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <label for="input-label" class="form-label">Banner<span
                                                class="text-danger">*</span> :</label>
                                        <input type="file" name="banner" class="form-control" id="input-label">
                                        <div class="container__img-holder">
                                            <img src="{{ asset('banners/contact/' . $contact->banner) }}" alt="banner"
                                                width="100">
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <label for="input-label" class="form-label">Map URL<span
                                                class="text-danger">*</span> :</label>
                                                <textarea name="map_url" class="form-control" rows="6" id="input-label">{{ $contact->map_url }} </textarea>
                         

                                    </div>

                                </div>
                            </div>
                            @include('admin.auth.error')
                            <div class="card-footer">
                                <button class="btn btn-primary-light btn-wave ms-auto float-end">Edit
                                    contact</button>
                            </div>
                        </form>
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
<script src="{{ asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('admin/js/simplebar.js')}}"></script>
<script src="{{ asset('admin/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('admin/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
<script src="{{ asset('admin/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js')}}"></script>
<script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/js/sales-dashboard.js')}}"></script>
<script src="{{ asset('admin/js/sticky.js')}}"></script>
<script src="{{ asset('admin/js/defaultmenu.js')}}"></script>
<script src="{{ asset('admin/js/custom.js')}}"></script>
<script src="{{ asset('admin/js/custom-switcher.js')}}"></script>

@endpush