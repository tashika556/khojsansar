@extends('frontend/layout')
@section('page_title','KhojSansar Nepal')


@section('container')

<section class="slider p-0">
    <div class="container-fluid p-0">
        <div class="slider-container">

            <div class="slider_text text-center">
                <h1>KhojSansar Nepal </h1>
                <p>Any Where Every Where</p>
            </div>

            <div class="slide" style="background-image: url('img/slider/slider01.jpg')">
            </div>

            <div class="slide" style="background-image: url('img/slider/slider02.jpg')">
            </div>

            <div class="slide" style="background-image: url('img/slider/slider03.jpg')">
            </div>

            <div class="controls-container">
                <div class="control"></div>
                <div class="control"></div>
                <div class="control"></div>
            </div>
            <div class="left_block ">
                <div class="left_block_text">
                    <h5><span><a href="contact.php" class="text-white">Contact us</a></span></h5>
                </div>
                <div class="left_block_social">
                    <ul>
                        <li><a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="search_section p-0">
    <div class="container">
    @include('frontend.search-bar')
    </div>
</section>




<section class="section_menu">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-lg-0 md:mb-4 mb-2">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </div>
                        <h3>Restaurant</h3>

                    </div>
                </a>

            </div>

            <div class="col-lg-3 col-md-6 mb-lg-0 md:mb-4 mb-2">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-server" aria-hidden="true"></i>
                        </div>
                        <h3>Digital Menu</h3>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 col-md-6 mb-lg-0 md:mb-4 mb-2">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </div>
                        <h3>Photoshot</h3>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 col-md-6 mb-lg-0 md:mb-4 mb-2">
                <a href="blog-detail.php">
                    <div class="card text-center">
                    <div class="icon-wrapper">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </div>
                    <h3> Event Management</h3>

                  </div>
                </a>
            </div>


        </div>
    </div>
</section>

<section class="news p-0">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center ">
                    <h5>Location</h5>
                    <div class="section_header">
                        <h1><span>Restaurants Around</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">

            <div class="col-lg-4">
                <a href="restaurant-list.php">
                    <div class="inner-box mr-sm-1 mr-0  mb-1">
                        <div class="image">
                            <img src="img/destinations/kathmandu.jpg" class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>Kathmandu</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="restaurant-list.php">
                    <div class="inner-box mr-sm-1 mr-0  mb-1">
                        <div class="image">

                            <img src="img/destinations/lalitpur.jpg" class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>Lalitpur</h2>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="restaurant-list.php">
                    <div class="inner-box mb-1">
                        <div class="image">

                            <img src="img/destinations/bhaktapur.jpg" class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>Bhaktapur</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-6">
                <a href="restaurant-list.php">
                    <div class="inner-box mr-md-1 mr-0 mb-1">
                        <div class="image">

                            <img src="img/destinations/pokhara.jpg" class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>Pokhara</h2>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="restaurant-list.php">
                    <div class="inner-box mb-1">
                        <div class="image">

                            <img src="img/destinations/chitwan.jpg" class="img-fluid" />
                            <div class="overlay-box text-white">
                                <h2>Chitwan</h2>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>

    </div>
</section>




@include('frontend.testimonial')
@include('frontend.partner')

@endsection