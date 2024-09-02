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
                        <select class="menu_option" name="city_state" disabled="disabled"
                            onchange="print_city_state(country,this)">
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
<section id="room_page" class="padding  position-relative ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="restaurant_detail_slider">
                            <div class="restaurant_detail-itme">
                                <img src="img/restaurant_bg.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="restaurant_detail-itme">
                                <img src="img/restaurant_bg.jpg" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="restaurant_detail_slider mt-4 mb-3 text-left">
                            <h2>Services</h2>
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
                <div class="row">
                    <div class="col-12">
                        <div class="restaurant_detail_slider mt-4 mb-3 text-left">
                            <h2>Image Gallery</h2>
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

                        <div class="position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                <div class="div">
                                    <h2>Review</h2>
                                </div>
                                <div class="default-btn-wrapp">
                                    <a data-toggle="modal" data-target="#exampleModalCenter" href="#"
                                        class="btn_default">Create review
                                        <span>→</span>
                                    </a>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        Launch demo modal
                                    </button> -->
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



                                                        <div class="default-btn-wrapp mt-4">
                                                            <button href="#" class="btn_default border-0">Submit
                                                                <span>→</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_block d-flex ">
                            <div class="review_img">
                                <img src="img/user.jpg" class="img-fluid">
                            </div>
                            <div class="review_content p-4">
                                <h5>Sachin Kumar jha</h5>
                                <div class="py-2">

                                    <h6>August 31, 2023 </h6>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ipsum nisi eos, animi
                                    quis debitis est incidunt, minus quisquam quod laudantium impedit culpa praesentium
                                    maiores dolore! Praesentium, modi. Sit, quia?</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto mt-4">


                        <div class="review_block d-flex ">
                            <div class="review_img">
                                <img src="img/user.jpg" class="img-fluid">
                            </div>
                            <div class="review_content p-4">
                                <h5>Sachin Kumar jha</h5>
                                <div class="py-2">

                                    <h6>August 31, 2023 </h6>
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

                    <div class="map_restaurant mb-4 ">
                        <div class="map_title">
                            <h4><span>Map</span></h4>
                        </div>
                        <iframe class="w-100 p-0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27689223729!2d85.29111335911601!3d27.709031933219393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1674706725522!5m2!1sen!2snp"
                            height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="restaurant_detai-block mb-4">
                        <div class="map_title">
                            <h4><span>Special Food</span></h4>
                        </div>
                        <div class="menu_list-restaurant bg_gray">

                            <div class="food-menu-item mb-3">

                                <div class="food-menu-main">
                                    <div class="food-menu-header d-flex align-items-center justify-content-between">
                                        <h5> <span>Capricciosa </span>
                                        </h5>
                                        <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                    </div>
                                    <p>Ricotta, goat cheese, beetroot and datterini.</p>
                                </div>
                            </div>
                            <hr>
                            <div class="food-menu-item mb-3">
                                <div class="food-menu-main">
                                    <div class="food-menu-header d-flex align-items-center justify-content-between">
                                        <h5> <span>Brussel Sprouts </span>
                                        </h5>
                                        <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                    </div>
                                    <p>Ricotta, goat cheese, beetroot and datterini.</p>
                                </div>
                            </div>
                            <hr>
                            <div class="food-menu-item mb-3">
                                <div class="food-menu-main">
                                    <div class="food-menu-header d-flex align-items-center justify-content-between">
                                        <h5> <span>
                                                Fresh Oysters Dozen</span>
                                        </h5>
                                        <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                    </div>
                                    <p>Ricotta, goat cheese, beetroot and datterini.</p>
                                </div>
                            </div>
                            <hr>
                            <div class="food-menu-item">
                                <div class="food-menu-main">
                                    <div class="food-menu-header d-flex align-items-center justify-content-between">
                                        <h5> <span>Bruno's Scribble </span>
                                        </h5>
                                        <div class="food-menu-lines"></div><span class="pt-food-menu-price">$36</span>
                                    </div>
                                    <p>Ricotta, goat cheese, beetroot and datterini.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="restaurant_detai-block">
                        <div class="map_title">
                            <h4><span>Contact Detail</span></h4>
                        </div>
                        <div class="deluxe-left-img position-relative dark_full box_shadow">
                            <div class="deluxe-left-img position-relative">
                                <img src="img/restaurant_bg.jpg" class="img-fluid" alt="">
                            </div>

                            <table class="table deluxe-left-text text-white">

                                <tbody>
                                    <tr>

                                        <td><span><i class="fa fa-user" aria-hidden="true"></i></span></td>
                                        <td>Buddhi Dangol</td>

                                    </tr>
                                    <tr>

                                        <td><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></td>
                                        <td>kumaripati Lalitpur, Nepal</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-envelope" aria-hidden="true"></i></span></td>
                                        <td>digisoft@gmail.com</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                                        </td>
                                        <td>01-5553000</td>

                                    </tr>
                                    <tr>
                                        <td><span><i class="fa fa-firefox" aria-hidden="true"></i></span></td>
                                        <td><a href="https://hotelmudita.com.np/">hotelmudita.com.np</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="default-btn-wrapp mt-4">
                        <a href="#" class="btn_default w-100">Digital Menu
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="container">
      
    </div>
</section> -->

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