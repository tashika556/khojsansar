@extends('frontend/layout')
@section('page_title','Blogs')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg')}});">
    <div class="banner_content text-white">
<h1>@yield('page_title')</h1>
    </div>
</section>

<section class="blog">
    <div class="container">
        <div class="row">

            @foreach($blog as $index => $cat)
            <div class="col-lg-4">
                <a href="{{ route('blog.details', $cat->id) }}">
                    <div class="blog_wrapp mb-4 position-relative">
                        <div class="blog_img">
                            <img src="{{ asset('uploads/blog/' . $cat->cover_image) }}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog_contetn text-white">


                            <h3>{{ $cat->title }}</h3>

                        </div>
                        <div class="date">
                            <h5>
                                <strong>{{ $cat->created_at->format('d') }}</strong>
                                <span>{{ $cat->created_at->format('M') }}</span>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</section>


@include('frontend.specialfoodrestaurantsection')
@include('frontend.testimonial')
@include('frontend.partner')
@endsection