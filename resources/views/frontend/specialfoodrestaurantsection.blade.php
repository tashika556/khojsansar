<section class="restaurant_home bg_img image_bg dark_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center text-white">
                    <h5>Explore</h5>
                    <div class="section_header">
                        <h1><span>Restaurant</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="restaurant_slider">
            @foreach($businesses as $business)
                @if($business->featuredSpecial)
                    <a href="{{ route('restaurant.detail', ['id' => $business->id]) }}">
                        <div class="restaurant_item bg-white">
                            <div class="menu_imgs text-center position-relative">
                                <div class="menu_img">
                                    <img src="{{ asset('storage/' . $business->featuredSpecial->photo) }}" class="img-fluid" alt="">
                                </div>
                                <div class="overlay">
                                    <div class="bottom-box p-4">
                                        <div>
                                            <h4>{{ $business->featuredSpecial->special_name }}</h4>
                                        </div>
                                        <p>{{ $business->featuredSpecial->short_detail }}</p>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="feature-price">
                                        {{ $business->featuredSpecial->price }}
                                    </div>
                                    <div class="px-5 pb-4">
                                        <div class="pt-4">
                                        <h4>{{ $business->featuredSpecial->special_name }}</h4>
                                            <p>{{ $business->address }}</p>
                                            <p class="text-golden"><strong>{{ $business->customershow->business }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>
