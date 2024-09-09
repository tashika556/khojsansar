@extends('admin/layout')
@section('page_title','View Pending Business')
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
                        <li class="breadcrumb-item"><a href="{{url('admin/pendingbusiness')}}">Pending Business</a>
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
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Manage Pending Business
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


                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr class="Business-list">
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">S.No.</th>
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Business Name
                                            </th>
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Category
                                            </th>
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Customer Name
                                            </th>
                                            <th class="bg-yellow-themed text-fixed-white " scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTable">
                                        @foreach($bustomer as $index => $bus)
                                        <tr class="Business-list">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="data-name">{{ $bus->first_name }}</td>
                                            <td class="province-name">{{ $bus->authorizeshow->authorize_name}}</td>
                                            <td class="muni-name">{{ $bus->categoryshow->category_name}}</td>
                                            <td>
                                                <a href="{{ route('viewpendingBusiness', $bus->id) }}"
                                                    class="btn btn-info btn-icon btn-sm">
                                                    <i class="ri-eye-line"></i>
                                                </a>

                                                <form action="{{ route('customer.destroy', $bus->id) }}" method="POST"
                                                    onsubmit="return confirmDelete()" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </form>
                                                <div class="dropdown d-inline">
                                                    <button
                                                        class="btn btn-primary-light btn-icon btn-sm dropdown-toggle"
                                                        type="button" id="dropdownMenuButton{{ $bus->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-2-line"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-status"
                                                        aria-labelledby="dropdownMenuButton{{ $bus->id }}">
                                                        <li>
                                                            <form
                                                                action="{{ route('pendingbusiness.verify', $bus->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="dropdown-item">Verify</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#rejectModal{{ $bus->id }}">
                                                                Reject
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="modal fade" id="rejectModal{{ $bus->id }}" tabindex="-1"
                                                    aria-labelledby="rejectModalLabel{{ $bus->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="rejectModalLabel{{ $bus->id }}">Reject Reason
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('pendingbusiness.reject', $bus->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="rejectionReason{{ $bus->id }}"
                                                                            class="form-label">Reason for
                                                                            Rejection</label>
                                                                        <textarea class="form-control"
                                                                            id="rejectionReason{{ $bus->id }}"
                                                                            name="rejection_reason" rows="3"
                                                                            required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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