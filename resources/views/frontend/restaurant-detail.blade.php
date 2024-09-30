@extends('frontend/layout')
@section('page_title','Restaurant Details')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ asset('uploads/businesscoverimage/'.$business->coverimage) }});">

    <section class="search_section p-0 w-100">
        <div class="container">

            @include('frontend.search-bar')
        </div>
    </section>
</section>

<section id="room_page" class="  position-relative ">
    <div class="restaurant">
        <div class="vertical-line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <div class="restaurant-logo">
                        <img src="{{ asset('uploads/businesslogo/' . $business->logo) }}" alt="">
                    </div>
                </div>
                <div class="restaurant_detail_heading">

                    <div class="section_header text-center">
                        <h1><span>{{ $business->customershow->business }}</span></h1>

                        <h5 class="category-title">{{ $business->customershow->categoryshow->category_name }}</h5>
                    </div>
                    <div class="restaurant-detail-about section_header text-center">
                        <p>{{ $business->summary}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <div class="restaurant_detail_slider section_header">
    @foreach($sliderPhotos as $photo)
        <div class="restaurant_detail-itme" style="background-image: url({{ asset('storage/uploads/slider_photos_videos/' . $photo->photosvideos) }});">
        </div>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    <div class="col-12">
                        <div class="restaurant_detail mt-4 mb-3 text-left">
                            <h2 class="border-animation">Services</h2>
                        </div>
                    </div>


                    @forelse($services as $service)
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2">
                                <img src="{{ asset('uploads/iconsservice/' . $service->service_logo) }}" class=""
                                    alt="">
                            </div>
                            <h4>{{ $service->service_name }}</h4>
                        </div>
                    </div>
                    @empty
                    <h4>No services available.</h4>

                    @endforelse


                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="restaurant_detail mt-4 mb-3 text-left">
                            <h2 class="border-animation">Gallery</h2>
                        </div>
                    </div>

                    @foreach($galleryPhotos as $photo)
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="{{ asset('storage/uploads/gallery_photos_videos/' . $photo->photosvideos) }}" alt="Image">
                        </div>
                    </div>
                    @endforeach

                    <div class="img-popup">
                        <img src="" alt="Popup Image">
                        <div class="close-btn">
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="map_restaurant" id="map" style="height: 400px;"></div>

                    </div>
                </div>
                @include('frontend.partials.review')



            </div>

            <div class="col-lg-4">

                <div class="restauran_side_block">
                    <div class="default-btn-wrapp mt-4 mb-4">
                        <a href="{{ route('menu.detail', ['id' => $business->id]) }}" class="btn_default w-100">Digital Menu
                            <span>→</span>
                        </a>
                    </div>

                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Special Food</span></h4>
                        </div>
                        <div class="special-menu-list">
                            @forelse($specials as $special)
                            <div class="special-menu-item mb-3">
                                <div class="special-menu-header d-flex align-items-center justify-content-between">
                                    <h5> <span>{{ $special->special_name }}</span></h5>
                                    <div class="food-menu-lines"></div><span
                                        class="pt-food-menu-price">${{ $special->price }}</span>
                                </div>
                                <p>{{ $special->short_detail }}</p>
                            </div>
                            <hr>
                            @empty
                            <p>No special items available.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Facility</span></h4>
                        </div>

                        <div class="special-menu-list">
                            <div class="facility-side-wrap">
                                <ul>
                                    @forelse($facilities as $facility)
                                    <li>
                                        <img src="{{ asset('uploads/iconsfacility/' . $facility->facility_logo) }}"
                                            alt="">
                                        <span>{{ $facility->facility_name }}</span>
                                    </li>
                                    @empty
                                    <li>No facilities available.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>




                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Contact Detail</span></h4>
                        </div>
                        <div class="special-menu-list">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td><span><i class="fa fa-user" aria-hidden="true"></i></span></td>
                                        <td>{{ $business->customershow->first_name }}
                                            {{ $business->customershow->middle_name }}
                                            {{ $business->customershow->last_name }}
                                            <span>({{ $business->customershow->authorizeshow->authorize_name }})</span>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></td>
                                        <td>{{ $business->customershow->address }}</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                                        </td>
                                        <td>{{ $business->customershow->phone }}, {{ $business->customershow->cell }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-envelope" aria-hidden="true"></i></span></td>
                                        <td>{{ $business->customershow->email }}</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-firefox" aria-hidden="true"></i></span></td>
                                        <td><a href="{{ $business->website_url}}" target="_blank">{{ $business->website_url}}</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.specialfoodrestaurantsection')
@include('frontend.testimonial')
@include('frontend.partner')
@endsection
@push("after-scripts")

<script>
document.addEventListener("DOMContentLoaded", function() {

var latitude = {{ $business->latitude }};
var longitude = {{ $business->longitude }};
var markerIconUrl = "{{ asset('frontend/img/marking-icon.png') }}";

if (latitude && longitude) {
    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

        maxZoom: 18
    }).addTo(map);

    var businessName = "{{ $business->customershow->business }}"; 
    var address = "{{ $business->address }}";

    var customIcon = L.divIcon({
        className: 'custom-icon',
        html: '<img src="' + markerIconUrl + '" style="width: 30px; height: 45px;">'
    });

    L.marker([latitude, longitude], { icon: customIcon }).addTo(map)
        .bindPopup(`<b>${businessName}</b><br>${address}`)
        .openPopup();
} else {
    console.error('Invalid latitude or longitude');
}
});
</script>
@endpush