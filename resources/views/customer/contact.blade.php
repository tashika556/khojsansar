@extends('customer/layout')
@section('page_title','Contact')


@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ asset('banners/contact/' . $contact->banner) }})">
    <div class="banner_content text-white">
        <h1>Contact
        </h1>
    </div>
</section>
<section class="contact_page contact_bg p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="custom-width float-right">
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
                                <p>{{ $contact->address_one }}</p>
                                <p>{{ $contact->address_two }}</p>

                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></div>
                                <h3>General Queries</h3>
                                <p><a href="tel:{{ $contact->phone_one }}">{{ $contact->phone_one }}</a></p>
                                <p><a href="tel:{{ $contact->phone_two }}">{{ $contact->phone_two }}</a></p>
                            </li>
                            <li>
                                <div class="icon icon_block"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <h3>Email Address</h3>
                                <p>{{ $contact->email_one }}</p>
                                <p>{{ $contact->email_two }}</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 bg_black">
                <div class="custom-width">
                    <div class="text-left pl-lg-5 pl-0 d-flex justify-content-center flex-column h-100">
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
    </div>
</section>

<section class="map pt-0">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <iframe class="w-100 bg-white"
                    src="{{ $contact->map_url }}"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>


@endsection