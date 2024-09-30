@extends('frontend/layout')
@section('page_title','KhojSansar Nepal')


@section('container')

<section class="slider p-0">
    <div class="container-fluid p-0">
        <div class="slider-container">

            <div class="slider_text text-center">
                <h1>{{ $sitesetting->site_title }}</h1>
                <p>{{ $sitesetting->caption }}</p>
            </div>
            @foreach($sitesetting->slider_images as $image)
            <div class="slide" style="background-image: url('{{ asset('sitesetting/sliders/' . $image) }}')">
            </div>

            @endforeach
            <div class="controls-container">
                <div class="control"></div>
                <div class="control"></div>
                <div class="control"></div>
            </div>
            <div class="left_block ">
                <div class="left_block_text">
                    <h5><span><a href="contact.php" class="text-white">Contact us</a></span></h5>
                </div>
                <div class="left_block_social">
                    <ul>
                        <li><a href="{{ $contact->facebook_url }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $contact->instagram_url }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $contact->twitter_url }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $contact->youtube_url }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="search_section p-0">
    <div class="container">
        @include('frontend.search-bar')
    </div>
</section>
@include('frontend.services-section')
<section class="news p-0">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center ">
                    <h5>Location</h5>
                    <div class="section_header">
                        <h1><span>Restaurants Around</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach($locationrestaurant->take(5) as $index => $locationrestaurants)
            <div class="{{ $index < 3 ? 'col-lg-4' : 'col-lg-6' }}">
                <a
                    href="{{ route('restaurant.list', ['district_id' => $locationrestaurants->district->id]) }}">
                    <div class="inner-box mr-sm-1 mr-0 mb-1">
                        <div class="image">
                            <img src="{{ asset('uploads/bannerbyrestaurant/' . $locationrestaurants->cover_image) }}"
                                class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>{{ $locationrestaurants->district->district_name }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>

    </div>
</section>

@include('frontend.testimonial')
@include('frontend.partner')

@endsection