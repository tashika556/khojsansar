<section class="testimonial">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="testimonial_img">
                    <img src="{{ URL::asset('frontend/img/testimonial-client.png') }}" class="img-fluid w-100" alt="">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center flex-column h-100">
                    <div class="section_title">
                        <h6><span>TESTIMONIALS</span></h6>
                        <div class="pb-md-4 py-2">
                            <h1>What Our Client Says </h1>
                        </div>
                    </div>
                    <div class="testimonial_block ">

                    

                    @foreach($testimonials as $testimonial)
                        <div class="testimonial_item">
                        <div class="d-flex justify-content-center flex-column h-100">
                            <div class="testimonial_text">
                                <p>{{ $testimonial->message }}</p>
                                <div class="py-4 ">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <span>{{ $testimonial->address }}</span>
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
</section>
