@include('frontend.header')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url(img/banner/contact.jpg);">
    <div class="banner_content text-white">

    </div>
</section>
<section class="contact_page contact_bg p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section_title d-flex justify-content-center flex-column h-100">
                    <div class="contact_text-right">
                        <h1>contact</h1>
                    </div>
                    <div class="py-md-4 py-2">
                        <h1>Here to &amp; help!...</h1>
                    </div>
                    <p>Have a question about the our service? We're here <br>
                        to help, contact us today!.</p>
                    <ul class="info-list clearfix mt-4">
                        <li>
                            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <h3>Location</h3>
                            <p>Kumaripati Kathmandu <br> Nepal</p>

                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></div>
                            <h3>General Queries</h3>
                            <p><a href="tel:01-5553000">01-5553000</a></p>

                        </li>
                        <li>
                            <div class="icon icon_block"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <h3>Email Address</h3>
                            <p>
                                digisoftdev@gmail.com</p>

                        </li>
                    </ul>




                </div>
            </div>
            <div class="col-lg-6 bg_black_before">
                <div class="text-left bg_gray pl-5 d-flex justify-content-center flex-column h-100">
                    <div class="form_block">
                        <div class="restaurant_detail_slider position-relative text-white">
                            <h2>Let’s talk!... <br>
                                Send your message us</h2>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="email" class="form-control" placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" class="form-control" placeholder="Enter email">

                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control"></textarea>
                        </div>


                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <div class="default-btn-wrapp mt-4">
                            <button href="#" class="btn_default border-0">Submit
                                <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map pt-0">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <iframe class="w-100 bg-white"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27689223729!2d85.29111335911601!3d27.709031933219393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1674801198719!5m2!1sen!2snp"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
@include('frontend.footer')