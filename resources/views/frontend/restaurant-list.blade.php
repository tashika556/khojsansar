<?php include 'header.php'; ?>
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url(img/slider/slider02.jpg);">

    <section class="search_section p-0 w-100">
        <div class="container">

            <form>
                <div class="row no-gutters bg-white">
                    <div class="col-lg-3 col-md-4">
                        <select onchange="set_country(this,country,city_state)" id="region">
                            <option value="" selected="selected">Province</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <select placeholder="dksk" name="country" disabled="disabled"
                            onchange="set_city_state(this,city_state)">
                            <option value="" selected="selected">Districts </option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <select name="city_state" disabled="disabled" onchange="print_city_state(country,this)">
                            <option value="" selected="selected">Menu </option>
                        </select>
                    </div>
                    <div class="col-lg-3 border-0">
                        <div class="search_btn">
                            <a href="">Search</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</section>



<!-- search end  -->

<section class="restaurant_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="side_block">
                    <div class="ul_wrapp bg_gray p-4 ">
                        <div class="ul_list ">
                            <div class="sidebar_title mb-4">
                                <h3><span>Kathmandu</span></h3>
                            </div>
                            <ul>
                                <a href="news_detail.php">
                                    <h4>The Chimney Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>
                                <a href="news_detail.php">
                                    <h4>Thamel House Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>
                                <a href="news_detail.php">
                                    <h4>The Chimney Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="ul_wrapp bg_gray p-4 mt-4">
                        <div class="ul_list ">

                            <div class="sidebar_title mb-4">
                                <h3><span>Favourite Location</span></h3>
                            </div>
                            <ul>
                                <a href="news_detail.php">
                                    <h4>Thamel House Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>
                                <a href="news_detail.php">
                                    <h4>Thamel House Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>
                                <a href="news_detail.php">
                                    <h4>Thamel House Restaurant</h4>
                                    <div class="py-2">
                                        <span> kumaripati Lalitpur, Nepal</span>
                                        <span>01-5553000</span>
                                    </div>

                                </a>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/restaurant-logo/logo1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/restaurant-logo/logo2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/restaurant-logo/logo3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/restaurant-logo/logo5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/restaurant-logo/logo6.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center p-4 mb-4">
                                <div class="restaurant_block-img">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text">
                                    <div class="py-2">
                                        <h5>Hotel Mudita</h5>
                                    </div>
                                    <a href="tel: 01-5553000">
                                        01-5553000</a>
                                    <div class="mt-1">
                                        <p>kumaripati Lalitpur, Nepal</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="restaurant_home bg_img image_bg dark_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="section_title text-center text-white">
                    <h5>Explore</h5>
                    <div class="section_header">
                        <h1><span>Restaurant</span> </h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="restaurant_slider">
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center p-5 position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="feature-price">
                        <i>$ </i> 42
                    </div>
                    <div class="py-4">
                        <h4>
                            Tuscan Flatbread
                        </h4>
                    </div>
                    <p>
                        Pork, chicken and vegetable fried rolls served with lettuce wraps
                    </p>


                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center p-5 position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="feature-price">
                        <i>$ </i> 42
                    </div>
                    <div class="py-4">
                        <h4>
                            Tuscan Flatbread
                        </h4>
                    </div>
                    <p>
                        Pork, chicken and vegetable fried rolls served with lettuce wraps
                    </p>

                    <div class="offer_block">
                        <p> RECOMMENDED
                        </p>
                    </div>
                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center p-5 position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="feature-price">
                        <i>$ </i> 42
                    </div>
                    <div class="py-4">
                        <h4>
                            Tuscan Flatbread
                        </h4>
                    </div>
                    <p>
                        Pork, chicken and vegetable fried rolls served with lettuce wraps
                    </p>


                </div>
            </div>
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center p-5 position-relative">
                    <div class="menu_img">
                        <img src="img/menu/menu01.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="feature-price">
                        <i>$ </i> 42
                    </div>
                    <div class="py-4">
                        <h4>
                            Tuscan Flatbread
                        </h4>
                    </div>
                    <p>
                        Pork, chicken and vegetable fried rolls served with lettuce wraps
                    </p>


                </div>
            </div>
        </div>
    </div>
</section>
<?php include "testimonial.php"; ?>

<?php include "footer.php"; ?>