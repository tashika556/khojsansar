<div class="side_block">
    <div class="ul_wrapp bg_gray p-4 mt-4">
        <div class="ul_list">
            <div class="sidebar_title mb-4">
                <h3><span>Most Popular Restaurants</span></h3>
            </div>
            <ul>
                @foreach ($popularRestaurants as $restaurant)
                    <a href="{{ route('restaurant.detail', ['id' => $restaurant->id]) }}">
                        <h4>{{ $restaurant->customershow->business }}</h4>
                        <div class="py-2">
                            <span>{{ $restaurant->address }}</span>
                            <span>{{ $restaurant->phone }}</span>
                        </div>
                       
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
