@extends('customer/auth-layout')
@section('page_title', 'Reset Password')
@section('container')
@section('col_class', 'col-xl-7 col-lg-7')
@section('colcreate_class', 'col-xl-5 col-lg-5')

<div class="container-block position-relative container-login">
    <div class="form-section position-relative">
        <h3>Reset Your Password</h3>

        <div class="login-inner-form">
            <form action="{{ route('customer.reset-password.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ request()->email }}">
                <div class="form-group clearfix">
                    <label for="code" class="form-label">Verification Code</label>
                    <div class="form-box">
                        <input name="code" type="text" class="form-control login-input" id="code"
                            placeholder="Enter Verification Code" required>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="password" class="form-label">New Password</label>
                    <div class="form-box">
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password"
                            required>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="form-box">
                        <input name="cpassword" type="password" class="form-control" id="password_confirmation"
                            placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group clearfix mb-2">
                    <button type="submit" class="btn btn-primary btn-lg btn-theme">Reset Password</button>
                </div>
                @include('admin.auth.error')
            </form>

        </div>
    </div>
</div>
@endsection