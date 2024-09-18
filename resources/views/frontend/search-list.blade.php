@extends('frontend/layout')
@section('page_title','Restaurant Search List')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url(img/slider/slider02.jpg);">

    <section class="search_section p-0 w-100">
        <div class="container">
            @include('frontend.search-bar')
        </div>
    </section>
</section>

<section class="restaurant_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('frontend.sidebar')
            </div>
            <div class="col-lg-8 mt-lg-0 mt-5">
                <div class="d-flex justify-content-between align-item-center">
                    <div class="d-flex">
                        <div class="items-per-page mb-4 d-flex align-items-center">
                            <label for="items-per-page-select">Show:</label>
                            <select id="items-per-page-select" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="search-bar mb-4">
                            <input type="text" id="search-input" class="form-control" placeholder="Search"
                                value="{{ request('search') }}">
                        </div>

                    </div>
                    <div class="category">
                        <form id="filter-form" method="GET" action="{{ route('restaurant.list') }}">
                            <select id="category-list" name="category_id" class="form-control">
                                <option class="d-none" disabled selected>Category</option>
                                @foreach($category as $categories)
                                <option value="{{ $categories->id }}"
                                    {{ request('category_id') == $categories->id ? 'selected' : '' }}>
                                    {{ $categories->category_name }}
                                </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">
                            <input type="hidden" name="municipality_id" value="{{ request('municipality_id') }}">
                            <input type="text" name="search" value="{{ request('search') }}" hidden>
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



<section class="restaurant_home bg_img image_bg dark_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center text-white">
                    <h5>Explore</h5>
                    <div class="section_header">
                        <h1><span>Restaurant</span> </h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="restaurant_slider">
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.testimonial')
@include('frontend.partner')
@endsection