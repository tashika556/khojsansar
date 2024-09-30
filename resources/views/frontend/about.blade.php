@extends('frontend/layout')
@section('page_title','About Us')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ asset('uploads/about/coverimage/' . $about->cover_image) }});">

    <div class="banner_content d-flex justify-content-center align-items-center h-100 text-white">
        <h1>@yield('page_title')
        </h1>
    </div>
</section>


<section class="pb-0">
    <div class="restaurant">
        <div class="vertical-line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="inner_heading text-center">
                    <h6>@yield('page_title')</h6>
                    <div class="">

                        <h2>{!! $about->details !!}</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="services logo_before">
    <div class="container">

        <div class="row">
            <div class="col-lg-7">
                <div class="img_wrapp d-flex flex-md-row flex-column">
                    <div class="img_one">
                        <img src="{{ asset('uploads/about/mission_image/one/' . $about->mission_image_one) }}" class="img-fluid" alt="">

                    </div>
                    <div class="img_two w-100">
                        <img src="{{ asset('uploads/about/mission_image/two/' . $about->mission_image_two) }}" class="img-fluid" alt="">

                    </div>
                </div>

            </div>
            <div class="col-lg-5">
                <div class="section_title d-flex justify-content-center flex-column h-100 pl-lg-5 pl-0 py-lg-0 py-5">
                    <h6><span>MISSION AND VISION</span></h6>
                    <div class="py-md-4 py-2">
                        <h1>OUR MISSION</h1>
                    </div>
                    <p>{!! $about->mission_details !!}</p>
                </div>
            </div>
        </div>
        <div class="row mt-lg-5 mt-0 pt-lg-5 pt-4">
            <div class="col-lg-5 order-lg-1 order-2">
                <div
                    class="section_title section_left d-flex justify-content-center flex-column h-100 pr-lg-5 pr-0 text-right mb-lg-0 mb-5 mt-lg-0 mt-3">
                    <h6><span>KHOJSANSAR NEPAL VISION</span></h6>
                    <div class="py-md-4 py-2">
                        <h1>OUR VISION</h1>
                    </div>
                    <p>{!! $about->vision_details !!}</p>
          
                </div>

            </div>
            <div class="col-lg-7 order-lg-2 order-1">
                <div class="section_title section_left d-flex justify-content-center flex-md-row flex-column">
                    <div class="restairant mr-1">
                        <img src="{{ asset('uploads/about/vision_image/one/' . $about->vision_image_one) }}" class="img-fluid" alt="">


                    </div>
                    <div class="restairant res_two mt-4 ml-lg-1 ml-0">
                        <img src="{{ asset('uploads/about/vision_image/two/' . $about->vision_image_two) }}" class="img-fluid" alt="">

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