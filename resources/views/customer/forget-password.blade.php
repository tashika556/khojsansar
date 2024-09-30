@extends('customer/auth-layout')
@section('page_title', 'KhojSansar Forget Password')
@section('container')
@section('col_class', 'col-xl-7 col-lg-7')
@section('colcreate_class', 'col-xl-5 col-lg-5')

<div class="container-block position-relative container-login">
    <div class="form-section position-relative">
        <div class="logos">
            <a href="{{ route('customer.login') }}">
                <img src="{{ URL::asset('customer/img/logo-color.png') }}" alt="logo">
            </a>
        </div>
        <h3>Recover your Password</h3>

        <div class="login-inner-form">
            <form action="{{ route('customer.send-reset-code') }}" method="POST">
                @csrf
                <div class="form-group clearfix">
                    <label for="first_field" class="form-label">Email address</label>
                    <div class="form-box">
                        <input name="email" type="email" class="form-control login-input" id="first_field"
                            placeholder="Email Address" required>
                    </div>
                </div>
                <div class="form-group clearfix mb-2">
                    <button type="submit" class="btn btn-primary btn-lg btn-theme">Send Me Email</button>
                </div>
                @include('admin.auth.error')
            </form>

        </div>
    </div>
</div>
@endsection