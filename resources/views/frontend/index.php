<?php include "header.php"; ?>

<section class="slider p-0">
    <div class="container-fluid p-0">
        <div class="slider-container">
            <!-- <div class="slider_img">
                <img src="img/logo.png" class="img-fluid" alt="">
            </div> -->
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
        <form>
                <div class="row no-gutters bg-white">
                    <div class="col-lg-2 col-sm-4 col-6">
                        <select id="region" onchange="setCountry(this)">
                            <option value="" selected="selected">Province</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <select id="district" name="country" disabled="disabled" onchange="setMunicipality(this)">
                            <option value="" selected="selected">Districts </option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <select id="municipality" name="country" disabled="disabled" onchange="setFavorite(this)">
                            <option value="" selected="selected">Municipality</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <select id="favorite" class="menu_option" name="city_state" disabled="disabled">
                            <option value="" selected="selected">Favorite</option>
                        </select>
                    </div>
                    <div class="col-lg-4 border-0">
                        <div class="search_btn">
                            <a href="">Search</a>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</section>


<!-- search end  -->
<section class="section_menu">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </div>
                        <h3>Restaurant</h3>

                    </div>
                </a>

            </div>

            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-server" aria-hidden="true"></i>
                        </div>
                        <h3>Digital Menu</h3>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                <a href="blog-detail.php">
                    <div class="card text-center">
                        <div class="icon-wrapper">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </div>
                        <h3>Photoshot</h3>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
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
            <!-- Project Block -->
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
            <!-- Project Block -->

        </div>

    </div>
</section>
<section class="restaurant_home bg_img img_before img_after pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center">
                    <h5>Explore</h5>
                    <div class="section_header">
                        <h1><span>Restaurant</span> </h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="restaurant_slider">
            <div class="restaurant_item">
                <div class="menu_imgs menu_black text-center position-relative text-white">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>

                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="restaurant_item">
                <div class="menu_imgs menu_black text-center position-relative text-white">
                    <div class="menu_img">
                        <img src="img/menu/menu03.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>

                    <div class="offer_block">
                        <p> RECOMMENDED
                        </p>
                    </div>
                </div>
            </div>
            <div class="restaurant_item">
                <div class="menu_imgs menu_black text-center position-relative text-white">
                    <div class="menu_img">
                        <img src="img/menu/hendrerit.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="restaurant_item">
                <div class="menu_imgs menu_black text-center position-relative text-white">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="overlay">
                        <div class="bottom-box p-4">
                            <div class="">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                            <p>
                                Pork, chicken and vegetable fried rolls served with lettuce wraps
                            </p>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="feature-price">
                            <i>$ </i> 42
                        </div>
                        <div class="px-5 pb-4">
                            <div class="pt-4">
                                <h4>
                                    Tuscan Flatbread
                                </h4>
                                <p>Kathmandu</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<?php include "testimonial.php"; ?>
<section class="booking-logo bg_gray py-4 position-relative">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>