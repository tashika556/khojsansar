<a id="button">Go To Top</a>

<section class="contact-area bg_img dark_bg " id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="contact-content text-center">
  
                    <div class="phone_text">
                        <h6>Kumaripati - 5 Lalitpur  Metropolitan  ,Nepal</h6>
                        <div class="footer_number">
                            <h2> <a href="tel: 01-5553000">
                                    01-5553000</a><span>
                            </h2>
                        </div>
                        <h6><a href="mailto:digisoftdev@gmail.com">

                                digisoftdev@gmail.com</a></h6>


                    </div>
                    <div class="contact-social">
                        <ul>
                            <li><a class="hover-target" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer_bottom d-flex align-items-center h-100 mt-5">

            <div class="col-lg-6 text-lg-left text-center d-flex">
                <p>Copyright © 2023 Nepal Restro.</p>
                <p>Website by: <a href="">DigiSoft Developers</a></p>
            </div>


            <div class="col-lg-6">
                <div class="footer_img d-flex justify-content-end align-items-center ">
                    <p>We Accept <span><i class="fa fa-hand-o-right" aria-hidden="true"></i></span></p>
                    <img src="{{ URL::asset('frontend/img/accepts.png')}}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </div>
</section>



@stack('before-scripts')
<script src="{{ URL::asset('frontend/js/jquery-1.12.4.min.js')}}"></script>

<script src="{{ URL::asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('frontend/js/slick.js')}}"></script>
<script src="{{ URL::asset('frontend/js/slick-animation.min.js')}}"></script>
<script src="{{ URL::asset('frontend/js/wow.js')}}"></script>
<script src="{{ URL::asset('frontend/js/font-awesom.js')}} "></script>
<script src="{{ URL::asset('frontend/js/typed.min.js')}}"
    integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.js"></script>
<script src="{{ URL::asset('frontend/js/main.js')}}"></script>
@stack('after-scripts')
</body>

</html>