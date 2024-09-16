<?php include 'header.php'; ?>
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url(img/slider/slider02.jpg);">

    <section class="search_section p-0 w-100">
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
            <div class="col-lg-8 mt-lg-0 mt-5">
                <div class="d-flex justify-content-between align-item-center">
                    <div class="d-flex">
                        <div class="items-per-page mb-4 d-flex align-items-center">
                            <label for="items-per-page-select">Show:</label>
                            <select id="items-per-page-select" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="search-bar mb-4">
                            <input type="text" id="search-input" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="category">
                        <select id="category-list" class="form-control">
                            <option class="d-none" disabled selected>Category</option>
                            <option>Typical/Ethnic</option>
                            <option>Cafeteria</option>
                            <option> Pub</option>
                            <option>Contemporary Dinner</option>
                        </select>
                    </div>
                </div>

                <div class="row" id="restaurant-list">
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/logo-color.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5453000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/restaurant-logo/logo1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/restaurant-logo/logo2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/restaurant-logo/logo3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/restaurant-logo/logo5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/restaurant-logo/logo6.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="restaurant-detail.php">
                            <div class="restaurant_list-block text-center mb-4">
                                <div class="restaurant_block-img p-4">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="restaurant_block-text px-4 pb-4">
                                    <div class="py-2">
                                        <h5 class="border-animation">motel Mudita</h5>
                                    </div>
                                    <div class="p-container">
                                        <div class="mt-1">
                                            <p>kumaripati Lalitpur, Nepal</p>
                                        </div>
                                        <a href="tel: 01-5553000">
                                            01-5553000
                                        </a>
                                    </div>
                                    <div class="more-border mt-2">
                                        <a href="restaurant-detail.php" class="more-btn more-border"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-item-center">
                    <div id="showing-counter" class="text-center mb-4">
                        Showing <span id="showing-start">1</span> to <span id="showing-end">6</span> of <span id="total-count">9</span> results
                    </div>
                    <div class="pagination" id="pagination">
                        <!-- Previous and Next buttons -->
                        <a href="#" class="pagination-link prev" data-page="prev">Previous</a>
                        <!-- Pagination links will be generated here -->
                        <a href="#" class="pagination-link next" data-page="next">Next</a>
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
                <div class="menu_imgs text-center position-relative">
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
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
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
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
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
            <div class="restaurant_item bg-white">
                <div class="menu_imgs text-center position-relative">
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