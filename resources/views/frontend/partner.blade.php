<section class="booking-logo bg_gray py-4 position-relative">
    <div class="container">
        <div class="row d-flex align-items-center">

        @foreach($partners as $partner)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="{{ $partner->url }}" class="logo_item" alt="#">
                    <img src="{{ asset('partners/' . $partner->logo) }}" alt="#">
                </a>
            </div>
            @endforeach


        </div>
    </div>
</section>