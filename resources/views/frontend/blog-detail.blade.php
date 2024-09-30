@extends('frontend/layout')
@section('page_title','Blog Details')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg')}});">
    <div class="banner_content text-white">
    <h1>@yield('page_title')</h1>
    </div>
</section>

<section class="blog_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section_title">
                    <h6><span>{{ $blog->created_at->format('F') }} {{ $blog->created_at->format('d') }},
                            {{ $blog->created_at->format('Y') }}</span></h6>
                    <div class="py-md-4 py-2">
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>
                <div class="blog_detail-img">
                    <img src="{{ asset('uploads/blog/' . $blog->cover_image) }}" class="img-fluid" alt="">
                </div>
                <div class="blog_detail-text mt-3">
                    {!! $blog->details !!}
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