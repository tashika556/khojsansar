@extends('customer/layout')
@section('page_title', 'Review from Users')

@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg') }})">
    <div class="banner_content text-white">
        <h1>@yield('page_title')</h1>
    </div>
</section>

<section class="testimonial">
    <div class="container">
        <ul class="nav nav-tabs" id="reviewTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#pendingReviews">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#allReviews">All Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#approvedReviews">Approved</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rejectedReviews">Rejected</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="pendingReviews">
                <div class="row">

                    <div class="col-12">

                        <div class="row">
                            @foreach ($pendingreviews as $review)
                            <div class="col-md-6 col-12">
                                <div class="testimonial_sliders position-relative bg_gray mb-4 mt-4">
                                    <div class="testimonial_box-inner">
                                        <div class="testimonial_box-top mb-4">
                                            <div class="testimonial_box-text">
                                                <p>{{ $review->review }}</p>
                                            </div>
                                            <div class="testimonial_box-shape"></div>
                                        </div>
                                        <div class="testimonial_box-bottom">
                                            <div class="testimonial_box-profile d-flex align-items-center">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ URL::asset('frontend/img/user-icon.png') }}"
                                                        alt="profile">
                                                </div>
                                                <div class="testimonial_box-info ml-2">
                                                    <div class="testimonial_box-name">
                                                        <h4>{{ $review->name }} - </h4>
                                                    </div>
                                                    <div class="testimonial_box-job">
                                                        <p>{{ $review->created_at->format('F j, Y') }}</p>

                                                        <p>
                                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                                @endif
                                                                @endfor
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.auth.error')
                                            <div class="mt-3">
                                                <form action="{{ route('reviews.approve', $review->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success submit-btn-form">Approve</button>
                                                </form>

                                                <form action="{{ route('reviews.reject', $review->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger submit-btn-form">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="allReviews">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            @foreach ($reviews as $review)



                            <div class="col-md-6 col-12">
                                <div class="testimonial_sliders position-relative bg_gray mb-4 mt-4">
                                    <div class="testimonial_box-inner">
                                        <div class="testimonial_box-top mb-4">
                                            <div class="testimonial_box-text">
                                                <p>{{ $review->review }}</p>
                                            </div>
                                            <div class="testimonial_box-shape"></div>
                                        </div>
                                        <div class="testimonial_box-bottom">
                                            <div class="testimonial_box-profile d-flex align-items-center">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ URL::asset('frontend/img/user-icon.png') }}"
                                                        alt="profile">
                                                </div>
                                                <div class="testimonial_box-info ml-2">
                                                    <div class="testimonial_box-name">
                                                        <h4>{{ $review->name }} - </h4>
                                                    </div>
                                                    <div class="testimonial_box-job">
                                                        <p>{{ $review->created_at->format('F j, Y') }}</p>

                                                        <p>
                                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                                @endif
                                                                @endfor
                                                        </p>
                                                        <p>
                                                            <strong>Status: </strong>
                                                            @if ($review->approved == 0 && $review->rejected == 0)
                                                            <span class="text-info">Pending</span>
                                                            @elseif ($review->approved == 1 && $review->rejected == 0)
                                                            <span class="text-success">Approved</span>
                                                            @else
                                                            <span class="text-danger">Rejected</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="approvedReviews">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            @foreach ($approvedreviews as $review)



                            <div class="col-md-6 col-12">
                                <div class="testimonial_sliders position-relative bg_gray mb-4 mt-4">
                                    <div class="testimonial_box-inner">
                                        <div class="testimonial_box-top mb-4">
                                            <div class="testimonial_box-text">
                                                <p>{{ $review->review }}</p>
                                            </div>
                                            <div class="testimonial_box-shape"></div>
                                        </div>
                                        <div class="testimonial_box-bottom">
                                            <div class="testimonial_box-profile d-flex align-items-center">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ URL::asset('frontend/img/user-icon.png') }}"
                                                        alt="profile">
                                                </div>
                                                <div class="testimonial_box-info ml-2">
                                                    <div class="testimonial_box-name">
                                                        <h4>{{ $review->name }} - </h4>
                                                    </div>
                                                    <div class="testimonial_box-job">
                                                        <p>{{ $review->created_at->format('F j, Y') }}</p>

                                                        <p>
                                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                                @endif
                                                                @endfor
                                                        </p>
                                                        <p>
                                                            <strong>Status: </strong>
                                                            @if ($review->approved == 0 && $review->rejected == 0)
                                                            <span class="text-info">Pending</span>
                                                            @elseif ($review->approved == 1 && $review->rejected == 0)
                                                            <span class="text-success">Approved</span>
                                                            @else
                                                            <span class="text-danger">Rejected</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-pane fade" id="rejectedReviews">
                <div class="row">

                    <div class="col-12">
                        <div class="row">



                            @foreach ($rejectedreviews as $review)



                            <div class="col-md-6 col-12">
                                <div class="testimonial_sliders position-relative bg_gray mb-4 mt-4">
                                    <div class="testimonial_box-inner">
                                        <div class="testimonial_box-top mb-4">
                                            <div class="testimonial_box-text">
                                                <p>{{ $review->review }}</p>
                                            </div>
                                            <div class="testimonial_box-shape"></div>
                                        </div>
                                        <div class="testimonial_box-bottom">
                                            <div class="testimonial_box-profile d-flex align-items-center">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ URL::asset('frontend/img/user-icon.png') }}"
                                                        alt="profile">
                                                </div>
                                                <div class="testimonial_box-info ml-2">
                                                    <div class="testimonial_box-name">
                                                        <h4>{{ $review->name }} - </h4>
                                                    </div>
                                                    <div class="testimonial_box-job">
                                                        <p>{{ $review->created_at->format('F j, Y') }}</p>

                                                        <p>
                                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                                @endif
                                                                @endfor
                                                        </p>
                                                        <p>
                                                            <strong>Status: </strong>
                                                            @if ($review->approved == 0 && $review->rejected == 0)
                                                            <span class="text-info">Pending</span>
                                                            @elseif ($review->approved == 1 && $review->rejected == 0)
                                                            <span class="text-success">Approved</span>
                                                            @else
                                                            <span class="text-danger">Rejected</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>


                </div>
            </div>


        </div>


    </div>
</section>


@endsection


@push("after-scripts")
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {

    $('#reviewTabs .nav-link').first().tab('show');

    $('#reviewTabs .nav-link').on('click', function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
});
</script>
@endpush