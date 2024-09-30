@extends('admin/layout')
@section('page_title','View Business Menus Details')
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
                        <li class="breadcrumb-item"><a href="{{url('admin/businessmenu')}}">Business Menus</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                    </ol>
                </div>
                <div>


                </div>
            </div>

            <div class="row">

                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-start d-flex">

                            @include('admin.auth.error')

                            <div class="header-element header-search d-md-block d-none my-auto">
                                <input type="text" class="header-search-bar form-control" id="header-search"
                                    placeholder="Search for Results..." spellcheck=false autocomplete="off"
                                    autocapitalize="off">
                                <a href="javascript:void(0);" class="header-search-icon border-0">
                                    <i class="bi bi-search"></i>
                                </a>

                            </div>

                            <div class="menu-pdf-title">
                                <p>Menu PDF</p>
                                <div class="mt-3">
                                    @if($menuPDF && $menuPDF->pdf)
                                    <a href="{{ Storage::url($menuPDF->pdf) }}" class="text-success"
                                        target="_blank">View PDF</a>
                                    @else
                                    <p>No PDF available</p>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr class="Customers-list">
                                            <th class="bg-yellow-themed text-fixed-white" scope="col">S.No.</th>
                                            <th class="bg-yellow-themed text-fixed-white" scope="col">Menu Topic</th>
                                            <th class="bg-yellow-themed text-fixed-white" scope="col">Title
                                            </th>
                                            <th class="bg-yellow-themed text-fixed-white" scope="col">Price</th>
                                            <th class="bg-yellow-themed text-fixed-white" scope="col">Caption</th>

                                        </tr>
                                    </thead>
                                    <tbody id="dataTable">
                                        @foreach($groupedMenus as $menuTopic => $items)
                                        @foreach($items as $item)
                                        <tr class="Customers-list">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="data-name">
                                                {{ $item->menu->menu_topic }}</td>
                                            <td class="province-name">{{ $item->title }}</td>
                                            <td class="muni-name">{{ $item->price }}</td>
                                            <td class="muni-name">{{ $item->caption }}</td>
                                            <td>{{ $menuTopic }}</td>

                                        </tr>
                                        @endforeach
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