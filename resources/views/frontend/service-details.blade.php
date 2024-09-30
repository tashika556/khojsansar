@extends('frontend/layout')
@section('page_title','Service Details')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ asset('uploads/khojsansarservice/' . $serviceDetail->banner) }});">
    <div class="banner_content text-white">
    <h1>{{ $serviceDetail->title }}</h1>
    </div>
</section>

<section class="blog_detail  ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section_title">
                
                    <div class="py-md-4 py-2">
                        <h1>{{ $serviceDetail->title }} </h1>
                    </div>
                </div>
  
                <div class="blog_detail-text mt-3">
                    <p>{{ $serviceDetail->details }}</p>
                </div>
            </div>
            <div class="col-lg-4">
            @include('frontend.sidebar')
            </div>
        </div>
    </div>
</section>



@include('frontend.specialfoodrestaurantsection')
@include('frontend.testimonial')
@include('frontend.partner')
@endsection