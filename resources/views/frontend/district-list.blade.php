@extends('frontend/layout')
@section('page_title','Restaurant List By District')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg') }})">

    <section class="search_section p-0 w-100">
        <div class="container">
            @include('frontend.search-bar')
        </div>
    </section>
</section>
<section class="restaurant_list">
    <div class="container">
        <div class="row">
        <div class="col-lg-4 order-lg-1 order-2">
                @include('frontend.sidebar')
            </div>
            <div class="col-lg-8 order-lg-2 order-1 mt-lg-0 mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="items-per-page mb-4 d-flex align-items-center">
                            <label for="items-per-page-select">Show:</label>
                            <select id="items-per-page-select" class="form-control">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                        <div class="search-bar mb-4">
                            <input type="text" id="search-input" class="form-control" placeholder="Search" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="category">
                        <form id="filter-form" method="GET" action="{{ route('restaurant.list') }}">
                            <select id="category-list" name="category_id" class="form-control">
                                <option class="d-none" disabled selected>Category</option>
                                @foreach($category as $categories)
                                <option value="{{ $categories->id }}" {{ request('category_id') == $categories->id ? 'selected' : '' }}>
                                    {{ $categories->category_name }}
                                </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="district_id" value="{{ request('district_id') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <button type="submit" style="display: none;">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="row" id="restaurant-list">
                    @include('frontend.partials.restaurant_display')
                </div>
                @include('frontend.partials.pagination')
            </div>
        </div>
    </div>
</section>


@include('frontend.specialfoodrestaurantsection')

@include('frontend.testimonial')
@include('frontend.partner')
@endsection 