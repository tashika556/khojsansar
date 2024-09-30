@extends('customer/auth-layout')
@section('page_title','KhojSansar Login')
@section('container')
@section('col_class','col-xl-7 col-lg-7')
@section('colcreate_class','col-xl-5 col-lg-5')
<div class="container-block position-relative container-login">
    <div class="form-section position-relative">
        <div class="logos">
            <a href="login-6.html">
                <img src="{{ URL::asset('customer/img/logo-color.png')}}" alt="logo">
            </a>
        </div>
        <h6 class="text-white text-center">Customer Login</h6>
        <h3>Sign Into Your Account</h3>
        <div class="login-inner-form">
            <form action="{{ url('/login-form') }}" method="POST">
                @csrf
                <div class="form-group clearfix">
                    <label for="first_field" class="form-label">Email address</label>
                    <div class="form-box">
                        <input name="email" type="email" class="form-control login-input" id="first_field"
                            placeholder="Email Address" aria-label="Email Address">
                        <!--<i class="flaticon-mail-2"></i>-->
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="second_field" class="form-label">Password</label>
                    <div class="form-box position-relative">
                        <input name="password" type="password" class="form-control login-input" autocomplete="off"
                            id="password" placeholder="Password" aria-label="Password">
                        <!--<i class="flaticon-password"></i>-->
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="first_field" class="form-label">OTP Number</label>
                    <div class="form-box">
                        <input name="otp" type="text" class="form-control login-input" id="first_field"
                            placeholder="OTP" aria-label="Email Address">
           
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="checkbox form-group clearfix">
             
                    <a href="{{url('customerforgetpassword')}}"
                        class="link-light float-center forgot-password ps-2">Forgot your password?</a>
                </div> @include('admin.auth.error')
                <div class="form-group clearfix mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-theme">Login</button>

                </div>

            </form>

            <p class="text-center">Don't have an account? <a href="{{url('customersignup')}}"> Register here</a></p>
        </div>
    </div>
</div>
@endsection