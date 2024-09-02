@extends('admin/layout')
@section('page_title','View Province')
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

            <!-- Start::page-header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">@yield('page_title')</h1>
                    <ol class="breadcrumb mb-0">

                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/province')}}">Provinces</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                    </ol>
                </div>
                <div>


                </div>
            </div>

            <div class="row">

                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Manage Provinces
                            </div>
                            @include('admin.auth.error')
                            <div class="d-flex">
                                <div class="header-element header-search d-md-block d-none my-auto">
                                    <input type="text" class="header-search-bar form-control" id="header-search"
                                        placeholder="Search for Results..." spellcheck=false autocomplete="off"
                                        autocapitalize="off">
                                    <a href="javascript:void(0);" class="header-search-icon border-0">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </div>
                                <a href="{{url('admin/createprovince')}}"
                                    class="btn btn-sm btn-primary btn-wave waves-light"><i
                                        class="ri-add-line fw-medium align-middle me-1"></i> Create Province</a>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr class="Data-list">
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">S.No.</th>
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Province Name
                                            </th>

                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTable">
                                        @foreach($province as $index => $pro)
                                        <tr class="Data-list">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="province-name">{{ $pro->province_name }}</td>
                                            <td>
                                                <a href="{{ route('editprovince', $pro->id) }}"
                                                    class="btn btn-primary-light btn-icon btn-sm">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <form action="{{ route('province.destroy', $pro->id) }}" method="POST"
                                                    onsubmit="return confirmDelete()" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="pagination-controls" class="d-flex justify-content-center mt-3">
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