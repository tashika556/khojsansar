@extends('customer/layout')
@section('page_title', 'Change Password')

@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ URL::asset('frontend/img/slider/slider02.jpg') }})">
    <div class="banner_content text-white">
        <h1>@yield('page_title')</h1>
    </div>
</section>

<section class="testimonial">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <form action="{{ route('customer.updatepassword') }}" method="POST">
                    @csrf

                    <div class="form-group clearfix">
                        <label for="password" class="form-label">Old Password</label>

                        <div class="form-box position-relative">
                            <input name="oldpassword" type="password" class="form-control" id="passwords"
                                placeholder="Password" required>

                            <span class="password-toggle-icons"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="password" class="form-label">New Password</label>
                        <div class="form-box position-relative">
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Password" required>

                            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>


                        <div class="form-box position-relative">
                            <input name="cpassword" type="password" class="form-control" id="cpasswords"
                                placeholder="Password" required>

                            <span class="password-toggle-iconc"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="form-group clearfix mb-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-theme submit-btn-form">Change Password</button>
                    </div>
                    @include('admin.auth.error')
                </form>
            </div>
        </div>
    </div>
</section>


@endsection


@push("after-scripts")
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endpush