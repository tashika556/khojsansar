@forelse($businesses as $business)
<div class="col-lg-4 col-sm-6">
    <a href="{{ route('restaurant.detail', ['id' => $business->id]) }}">
        <div class="restaurant_list-block text-center mb-4">
            @if($business->openeveryday == 1)
            <div class="open">
                <p>24/7</p>
            </div>
            @endif

            <div class="restaurant_block-img p-4">
                <img src="{{ asset('uploads/businesslogo/' . $business->logo) }}" class="img-fluid" alt="">
            </div>
            <div class="restaurant_block-text px-4 pb-4">
                <div class="py-2">
                    <h5 class="border-animation">{{ $business->customershow->business }}</h5>
                </div>
                <div class="p-container">
                    <div class="mt-1">
                        <p>{{ $business->address }}</p>
                    </div>
                </div>
                <a href="{{ route('restaurant.detail', ['id' => $business->id]) }}" class="restaurant-btn">
                    <i class="fa fa-angle-double-right"></i>
                    <span>Read More</span>
                </a>

            </div>
        </div>
    </a>
</div>
@empty
<p>No restaurants found.</p>
@endforelse