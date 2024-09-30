@extends('admin/layout')
@section('page_title','Edit Site Setting')
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
                                <li class="breadcrumb-item"><a href="{{url('admin/sitesetting')}}">Site Settings</a>
                                </li>
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
                        <form action="{{ route('updatesitesetting', $sitesetting->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row gy-3">
                                    <!-- Site Title and Caption -->
                                    <div class="col-xl-4">
                                        <label for="site_title" class="form-label">Site Title<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" value="{{ $sitesetting->site_title }}" name="site_title"
                                            class="form-control" id="site_title" placeholder="Enter Site Title">
                                    </div>
                                    <div class="col-xl-4">
                                        <label for="caption" class="form-label">Caption<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" name="caption" value="{{ $sitesetting->caption }}"
                                            class="form-control" id="caption" placeholder="Enter Caption">
                                    </div>
                                    <!-- Logo Upload -->
                                    <div class="col-xl-4">
                                        <label for="logo" class="form-label">Logo<span class="text-danger">*</span>
                                            :</label>
                                        <input type="file" name="logo" class="form-control" id="logo">
                                        <img src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" alt="Logo"
                                            width="100">
                                    </div>


                                    <div class="col-12">
                                        <label for="slider_images" class="form-label">Slider Images (Home Page)<span
                                                class="text-danger">*</span> :</label>
                                        <div id="existing-slider-images" class="d-flex mb-3">

                                            @foreach($sitesetting->slider_images as $image)
                                            <div class="slider-image-wrapper position-relative"
                                                id="slider-image-{{ $loop->index }}">
                                                <div class="container__img-holder">
                                                    <img src="{{ asset('sitesetting/sliders/' . $image) }}"
                                                        alt="Slider Image" width="100">
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-slider-image"
                                                    data-image="{{ $image }}">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                                <input type="hidden" name="existing_slider_images[]"
                                                    value="{{ $image }}">
                                         


                                            </div>
                                            @endforeach
                                        </div>

                                        <input type="file" id="slider_images" name="new_slider_images[]"
                                            accept="image/*" multiple>
                                        <div id="new-slider-images-preview" class="d-flex mb-3"></div>
                                    </div>
                                </div>
                            </div>

                            @include('admin.auth.error')
                            <div class="card-footer">
                                <button class="btn btn-primary-light btn-wave ms-auto float-end">Edit Site
                                    Settings</button>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.remove-slider-image').forEach(btn => {
        btn.addEventListener('click', function() {
            const image = btn.getAttribute('data-image');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleted_slider_images[]';
            input.value = image;
            document.querySelector('form').appendChild(input);
            btn.parentElement.remove();
        });
    });
   

    // Existing code for handling new images
    const imageInput = document.getElementById('slider_images');
    const previewContainer = document.getElementById('new-slider-images-preview');
    let filesArray = Array.from(imageInput.files);

    imageInput.addEventListener('change', function(e) {
        const newFiles = e.target.files;
        filesArray = filesArray.concat(Array.from(newFiles));
        updatePreview();
    });

    previewContainer.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-new-slider-image')) {
            const index = parseInt(e.target.getAttribute('data-index'));
            e.target.closest('.slider-image-wrapper').remove();
            filesArray = filesArray.filter((_, i) => i !== index);
            updatePreview();
            updateFileInput();
        }
    });

    function updatePreview() {
        previewContainer.innerHTML = '';
        filesArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgWrapper = document.createElement('div');
                imgWrapper.classList.add('slider-image-wrapper', 'container__img-holder', 'position-relative');
                imgWrapper.innerHTML = `
                    <img src="${e.target.result}" alt="New Slider Image" width="100">
                    <i class="ri-close-line remove-new-slider-image" data-index="${index}"></i>
                `;
                previewContainer.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    function updateFileInput() {
        const dt = new DataTransfer();
        filesArray.forEach(file => dt.items.add(file));
        imageInput.files = dt.files;
    }

    document.querySelector('form').addEventListener('submit', function() {
        updateFileInput();
    });
});

</script>
@endpush