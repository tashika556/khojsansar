@extends('frontend/layout')
@section('page_title','Testimonial')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
   style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg') }})">
    <div class="banner_content text-white">
        <h1> What Client says about us ? </h1>

    </div>
</section>
<section class="testimonial">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

            @foreach($testimonials as $index => $cat)
                <div class="testimonial_sliders position-relative bg_gray">

                    <div class="testimonial_box-inner  mb-4">
                        <div class="testimonial_box-top mb-4">

                            <div class="testimonial_box-text">
                                <p>{{ $cat->message }}</p>
                            </div>
                            <div class="testimonial_box-shape"></div>
                        </div>
                        <div class="testimonial_box-bottom">
                            <div class="testimonial_box-profile d-flex align-items-center">
                                <div class="testimonial_box-img">
                                    <img src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}">
                                </div>
                                <div class="testimonial_box-info ml-2">
                                    <div class="testimonial_box-name">
                                        <h4>
                                        {{ $cat->name }}
                                            - </h4>
                                    </div>
                                    <div class="testimonial_box-job">
                                        <p> {{ $cat->address }}</p>
                                    </div>
                                </div>
                                <div class="quote"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="col-lg-4">
            @include('frontend.sidebar')
            </div>
        </div>
    </div>
</section>


@include('frontend.partner')
@endsection