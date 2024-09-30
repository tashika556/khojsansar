<div class="row">
    <div class="col-lg-12 mx-auto ">

        <div class="position-relative">
            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <div class="div">
                    <h2 class="border-animation">Review</h2>
                </div>
                <div class="default-btn-wrapp">
                    <div class="review-btn">
                        <a data-toggle="modal" data-target="#exampleModalCenter" href="#" class="btn_default">Create
                            review
                            <span>→</span>
                        </a>
                    </div>
                    @include('admin.auth.error')
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header p-0">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg_gray">
                                    <form class="text-left p-lg-4 p-3"
                                        action="{{ route('reviews.store', $business->id) }}" method="POST">
                                        @csrf

                                        <p>Rating:
                                            <span class="star-rating">
                                                @for ($i = 1; $i <= 5; $i++) <label for="rate-{{ $i }}"
                                                    style="--i:{{ $i }}">
                                                    <i class="fa-solid fa-star"></i>
                                                    </label>
                                                    <input type="radio" name="rating" id="rate-{{ $i }}"
                                                        value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}
                                                        required>
                                                    @endfor
                                            </span>
                                        </p>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                                value="{{ old('name') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="review" class="form-control"
                                                required>{{ old('review') }}</textarea>
                                        </div>

                                        <div class="default-btn-wrapp d-flex justify-content-center mt-4">
                                            <button type="submit" class="btn_default border-0">Submit
                                                <span>→</span></button>
                                        </div>
                                       
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    @foreach ($business->reviews->where('approved', 1)->where('rejected', 0) as $review)
    <div class="col-lg-12 mx-auto mt-4">
        <div class="review_block d-sm-flex d-block">
            <div class="review_img">
                <img src="{{ URL::asset('frontend/img/user-icon.png') }}" class="img-fluid">
            </div>
            <div class="review_content pl-sm-4 pl-0">
                <div class="d-sm-flex d-block justify-content-between">
                    <h5>{{ $review->name }}</h5>
                    <div class="py-2">
                        <h6>{{ $review->created_at->format('F j, Y') }}</h6>
                    </div>
                </div>

                <p>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="fa-solid fa-star text-warning"></i> 
                        @else
                            <i class="fa-regular fa-star text-warning"></i> 
                        @endif
                    @endfor
                </p>
                
                <p>{{ $review->review }}</p>
            </div>
        </div>
    </div>
@endforeach


</div>