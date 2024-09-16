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
<section id="room_page" class="  position-relative ">
    <div class="restaurant">
        <div class="vertical-line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <div class="restaurant-logo">
                        <img src="img/logo-color.png" alt="">
                    </div>
                </div>
                <div class="restaurant_detail_heading">

                    <div class="section_header text-center">
                        <h1><span>Restaurants</span></h1>
                        <h5 class="category-title">Typical/Ethnic</h5>
                    </div>
                    <div class="restaurant-detail-about section_header text-center">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eveniet aspernatur exercitationem neque perferendis quis eum impedit iusto cumque, possimus saepe quisquam dicta deleniti soluta!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eveniet aspernatur exercitationem neque perferendis quis eum impedit iusto cumque, possimus saepe quisquam dicta deleniti soluta!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <div class="restaurant_detail_slider section_header">
        <div class="restaurant_detail-itme" style="background-image: url(img/restaurant_bg.jpg);">
        </div>
        <div class="restaurant_detail-itme" style="background-image: url(img/restaurant_bg.jpg);">
        </div>
        <div class="restaurant_detail-itme" style="background-image: url(img/restaurant_bg.jpg);">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    <div class="col-12">
                        <div class="restaurant_detail mt-4 mb-3 text-left">
                            <h2 class="border-animation">Services</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2">
                                <img src="img/services/buffet.png" class="" alt="">
                            </div>
                            <h4>Buffet service</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/chinese.png" class="" alt="">
                            </div>
                            <h4>Chinese banquet</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/dining.png" class="" alt="">
                            </div>
                            <h4>Dining </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/fast-food.png" class="" alt="">
                            </div>
                            <h4>Fast Food </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/food-truck.png" class="" alt="">
                            </div>
                            <h4>Food Delivery</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/semi-self.png" class="" alt="">
                            </div>
                            <h4>Semi-self</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/waiter.png" class="" alt="">
                            </div>
                            <h4>Waiter</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_list d-flex align-items-center mb-4">
                            <div class="services_img pr-2 ">
                                <img src="img/services/food-restaurant.png" class="" alt="">
                            </div>
                            <h4>Food</h4>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="restaurant_detail mt-4 mb-3 text-left">
                            <h2 class="border-animation">Gallery</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/menu01.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/hendrerit.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/image02.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/tuscan.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/menu01.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="container__img-holder">
                            <img src="img/menu/hendrerit.jpg" alt="Image">
                        </div>
                    </div>


                    <div class="img-popup">
                        <img src="" alt="Popup Image">
                        <div class="close-btn">
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 mx-auto ">
                        <div class="map_restaurant">
                            <iframe class="w-100 p-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27689223729!2d85.29111335911601!3d27.709031933219393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1674706725522!5m2!1sen!2snp"
                                height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mx-auto ">

                        <div class="position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                <div class="div">
                                    <h2 class="border-animation">Review</h2>
                                </div>
                                <div class="default-btn-wrapp">
                                    <div class="review-btn">
                                        <a data-toggle="modal" data-target="#exampleModalCenter" href="#"
                                            class="btn_default">Create review
                                            <span>→</span>
                                        </a>
                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header p-0">

                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg_gray">
                                                    <form class="text-left  p-lg-4 p-3">

                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="email" class="form-control"
                                                                placeholder="Enter email">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email </label>
                                                            <input type="email" class="form-control"
                                                                placeholder="Enter email">

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Message</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="default-btn-wrapp d-flex justify-content-center  mt-4">
                                                            <button type="button" href="" class="btn_default border-0" data-toggle="collapse" data-target="#demo">Submit
                                                                <span>→</span>
                                                            </button>
                                                        </div>
                                                        <div id="demo" class="collapse">
                                                            <p class="collapse-style"><span>to give review Login with</span></p>
                                                            <div class="account-container d-flex justify-content-center">
                                                                <button class="signin-button mr-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="17" height="17" viewBox="0 0 48 48">
                                                                        <path fill="#3f51b5" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                                                                        <path fill="#fff" d="M29.368,24H26v12h-5V24h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H30v4h-2.287 C26.104,16,26,16.6,26,17.723V20h4L29.368,24z"></path>
                                                                    </svg>
                                                                    <span>Facebook</span>
                                                                </button>
                                                                <button class="signin-button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="17" height="17" viewBox="0 0 48 48">
                                                                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                                                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                                                        <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                                                        <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                                                    </svg>
                                                                    <span>Google</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_block d-sm-flex d-block">
                            <div class="review_img">
                                <img src="img/user.jpg" class="img-fluid">
                            </div>
                            <div class="review_content pl-sm-4 pl-0">
                                <div class="d-sm-flex d-block justify-content-between">
                                    <h5>Sachin Kumar jha</h5>
                                    <div class="py-2">

                                        <h6>August 31, 2023 </h6>
                                    </div>
                                </div>

                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ipsum nisi eos, animi
                                    quis debitis est incidunt, minus quisquam quod laudantium impedit culpa praesentium
                                    maiores dolore! Praesentium, modi. Sit, quia?</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto mt-4">
                        <div class="review_block d-sm-flex d-block">
                            <div class="review_img">
                                <img src="img/user.jpg" class="img-fluid">
                            </div>
                            <div class="review_content pl-sm-4 pl-0">
                                <div class="d-sm-flex d-block justify-content-between">
                                    <h5>Sachin Kumar jha</h5>
                                    <div class="py-2">

                                        <h6>August 31, 2023 </h6>
                                    </div>
                                </div>

                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ipsum nisi eos, animi
                                    quis debitis est incidunt, minus quisquam quod laudantium impedit culpa praesentium
                                    maiores dolore! Praesentium, modi. Sit, quia?</p>

                            </div>
                        </div>
                    </div>



                </div>




            </div>

            <div class="col-lg-4">

                <div class="restauran_side_block">
                    <div class="default-btn-wrapp mt-4 mb-4">
                        <a href="digital-menu.php" class="btn_default w-100">Digital Menu
                            <span>→</span>
                        </a>
                    </div>

                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Special Food</span></h4>
                        </div>
                        <div class="special-menu-list">

                            <div class="special-menu-item mb-3">

                                <div class="special-menu-header d-flex align-items-center justify-content-between">
                                    <h5> <span>Capricciosa </span>
                                    </h5>
                                    <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                </div>
                                <p>Ricotta, goat cheese, beetroot and datterini.</p>
                            </div>
                            <hr>
                            <div class="special-menu-item mb-3">
                                <div class="special-menu-header d-flex align-items-center justify-content-between">
                                    <h5> <span>Brussel Sprouts </span>
                                    </h5>
                                    <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                </div>
                                <p>Ricotta, goat cheese, beetroot and datterini.</p>
                            </div>
                            <hr>
                            <div class="special-menu-item mb-3">
                                <div class="special-menu-header d-flex align-items-center justify-content-between">
                                    <h5> <span>
                                            Fresh Oysters Dozen</span>
                                    </h5>
                                    <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                </div>
                                <p>Ricotta, goat cheese, beetroot and datterini.</p>
                            </div>
                            <hr>
                            <div class="special-menu-item">
                                <div class="special-menu-header d-flex align-items-center justify-content-between">
                                    <h5> <span>Bruno's Scribble </span>
                                    </h5>
                                    <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                </div>
                                <p>Ricotta, goat cheese, beetroot and datterini.</p>
                            </div>
                        </div>
                    </div>
                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Facility</span></h4>
                        </div>
                        <div class="special-menu-list">
                            <div class="facility-side-wrap">
                                <ul>
                                    <li>
                                        <img src="img/icon/wifi.png" alt="">
                                        <span>Free Wifi</span>
                                    </li>



                                    <li>
                                        <img src="img/icon/smoking.png" alt="">
                                        <span>Smoking Zone</span>
                                    </li>
                                    <li>
                                        <img src="img/icon/parking.png" alt="">
                                        <span>Parking</span>
                                    </li>
                                    <li>
                                        <img src="img/icon/delivery.png" alt="">
                                        <span>Delivery</span>
                                    </li>
                                    <li>
                                        <img src="img/icon/drink.png" alt="">
                                        <span>Welcome Drinks</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="restaurant_detail-block mb-4">
                        <div class="side-title">
                            <h4><span>Contact Detail</span></h4>
                        </div>
                        <div class="special-menu-list">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td><span><i class="fa fa-user" aria-hidden="true"></i></span></td>
                                        <td>Buddhi Dangol <span>(Manager)</span></td>

                                    </tr>
                                    <tr>

                                        <td><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></td>
                                        <td>Kumaripati-05, Lalitpur Municipality, Lalitpur Nepal</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                                        </td>
                                        <td>+977-01-5453000, +977-9803030780</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-envelope" aria-hidden="true"></i></span></td>
                                        <td>info@khojsansar.com</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-firefox" aria-hidden="true"></i></span></td>
                                        <td><a href="https://hotelmudita.com.np/">hotelmudita.com.np</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
            <div class="col-md-2 col-6 text-center">
                <a href="" class="logo_item" alt="#">
                    <img src="img/client/digisoft.png" alt="#">
                </a>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>