@extends('customer/auth-layout')
@section('page_title','KhojSansar Register')
@section('container')
@section('col_class','col-xl-7 col-lg-7')
@section('colcreate_class','col-xl-5 col-lg-5')
<div class="form-section">
    <div class="logos">
        <a href="login-6.html">
            <img src="{{ URL::asset('admin/images/brand-logos/digi-logo.png')}}" alt="logo">
        </a>
    </div>
    <h6 class="text-white text-center">Customer Signup</h6>
    <h3>Create Your Account</h3>
    <div class="login-inner-form">
        <form action="{{ url('/reg-form') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="form-group clearfix">
                        <label for="authorize" class="form-label">Authorize: <span class="text-span">*</span></label>
                        <div class="form-box">
                            <select name="authorize" class="form-control login-signup" id="">
                                <option value="">Select Authorize</option>
                                @foreach($authorizes as $data)
                                <option value="{{$data->id}}">{{$data->authorize_name}}</option>
                                @endforeach
                            </select>


                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label for="business" class="form-label">Business / Organization Name: <span
                                class="text-span">*</span></label>
                        <div class="form-box">
                            <input name="business" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Business / Organization Name">


                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group clearfix">
                        <label for="category" class="form-label">Category: <span class="text-span">*</span></label>
                        <div class="form-box">
                            <select name="category" class="form-control login-signup" id="">
                                <option value="">Select Category</option>
                                @foreach($categories as $data)
                                <option value="{{$data->id}}">{{$data->category_name}}</option>
                                @endforeach
                            </select>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">First Name: <span class="text-span">*</span></label>
                        <div class="form-box">
                            <input name="first_name" type="text" class="form-control login-signup" id="first_field"
                                placeholder="First Name">


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Middle Name:</label>
                        <div class="form-box">
                            <input name="middle_name" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Middle Name">


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Last Name: <span class="text-span">*</span></label>
                        <div class="form-box">
                            <input name="last_name" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Last Name">


                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <b class="opacity-25">Permanent Address</b>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Province:</label>
                        <div class="form-box">
                            <select name="permanent_state" id="province" class="form-control login-signup">
                                <option value="">- - Province - - *</option>
                                @foreach($provinces as $data)
                                <option value="{{$data->id}}">{{$data->province_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">District:</label>
                        <div class="form-box">


                            <select id="district" name="permanent_district" class="form-control login-signup">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Municipality/Palika:</label>
                        <div class="form-box">
                            <select id="municipality" name="permanent_municipality" class="form-control login-signup">

                            </select>



                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Ward No.:</label>
                        <div class="form-box">
                            <input name="permanent_ward" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Ward No">


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Tole.:</label>
                        <div class="form-box">
                            <input name="permanent_tole" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Tole">


                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Email address</label>
                        <div class="form-box">
                            <input name="email" type="email" class="form-control login-signup" id="first_field"
                                placeholder="Email Address" aria-label="Email Address">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Phone</label>
                        <div class="form-box">
                            <input name="phone" type="tel" class="form-control login-signup" id="first_field"
                                placeholder="Phone">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Cell</label>
                        <div class="form-box">
                            <input name="cell" type="tel" class="form-control login-signup" id="first_field"
                                placeholder="Cell Number">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Username</label>
                        <div class="form-box">
                            <input name="user_name" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Username">

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="second_field" class="form-label">Password</label>
                        <div class="form-box position-relative">
                            <input name="password" type="password" class="form-control" autocomplete="off" id="password"
                                placeholder="Password" aria-label="Password">
                            <span class="password-toggle-icon pb-3"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="second_field" class="form-label">Confirm Password</label>
                        <div class="form-box position-relative">
                            <input name="cpassword" type="password" class="form-control" autocomplete="off"
                                id="passwords" placeholder="Confirm Password" aria-label="Password">
                            <span class="password-toggle-icons pb-3"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group clearfix">
                        <div class="form-box position-relative">
                            <input class="form-check-input" name="agree" type="checkbox"  value="1" required>

                            <label for="form-check-label" class="form-label">I agree to the 
                                <a href="{{url('termscondition')}}" target="_blank" class="text-greenthemed terms">Terms and Conditions.</a></label>
                        </div>

                    </div>
                </div>
                <div class="form-group clearfix mb-0">
                @include('admin.auth.error')
                    <button type="submit" class="btn btn-primary btn-lg btn-theme">Register</button>
                </div>
            </div>
        </form>

        <p class="text-center">Already have an account? <a href="{{url('customerlogin')}}"> Login here</a></p>
    </div>
</div>


@endsection

@push("after-scripts")

@endpush