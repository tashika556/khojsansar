<section class="section_menu">
    <div class="container">

        <div class="row">

            @foreach($khojsansarservice as $index => $cat)
            <div class="col-lg-3 col-md-6 mb-lg-0 md:mb-4 mb-2">
                <a href="{{ route('service.details', $cat->id) }}">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <img src="{{ asset('uploads/khojsansarservice/icon/' . $cat->icon) }}" alt="">
                        </div>
                        <h3>{{ $cat->title }}</h3>
                    </div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</section>