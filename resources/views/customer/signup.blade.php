@extends('customer/auth-layout')
@section('page_title','KhojSansar Register')
@section('container')
@section('col_class','col-xl-6 col-lg-7')
@section('colcreate_class','col-xl-6 col-lg-5')
<div class="container-block position-relative">
    <div class="form-section position-relative">
        <div class="logos">
            <a href="login-6.html">
                <img src="{{ URL::asset('customer/img/logo-color.png')}}" alt="logo">
            </a>
        </div>
        <h6 class="text-white text-center">Customer Signup</h6>
        <h3>Create Your Account</h3>
        <div class="login-inner-form">
            <form action="{{ url('/reg-form') }}" method="POST">
                @csrf
                <!--<div class="row">-->
                <div class="form-divide">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="authorize" class="form-label">Authorize: <span class="text-span">*</span></label>-->
                                <div class="form-box">
                                    <select name="authorize" class="form-control login-signup rounded-0" id="" required>
                                        <option class="d-none" value="">Select Authorize</option>
                                        @foreach($authorizes as $data)
                                        <option value="{{$data->id}}">{{$data->authorize_name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <!--<label for="business" class="form-label">Business / Organization Name: <span class="text-span">*</span></label>-->
                                <div class="form-box">
                                    <input name="business" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Business / Organization Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="category" class="form-label">Category: <span class="text-span">*</span></label>-->
                                <div class="form-box">
                                    <select name="category" class="form-control login-signup rounded-0" id="" required>
                                        <option class="d-none" value="">Select Category</option>
                                        @foreach($categories as $data)
                                        <option value="{{$data->id}}">{{$data->category_name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6  col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">First Name: <span class="text-span">*</span></label>-->
                                <div class="form-box">
                                    <input name="first_name" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="First Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Middle Name:</label>-->
                                <div class="form-box">
                                    <input name="middle_name" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Middle Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Last Name: <span class="text-span">*</span></label>-->
                                <div class="form-box">
                                    <input name="last_name" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>@include('admin.auth.error')
                        <div>
                            <button class="next-button btn btn_green btn_navigation border-0 rounded-0">Next</button>
                        </div>
                    </div>

                </div>

                <div class="form-divide">
                    <div class="row">
                        <div class="col-12">
                            <b class="opacity-25">Permanent Address</b>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Province:</label>-->
                                <div class="form-box">
                                    <select name="permanent_state" id="province"
                                        class="form-control login-signup rounded-0" required>
                                        <option class="d-none" value="">- - Province - - *</option>
                                        @foreach($provinces as $data)
                                        <option value="{{$data->id}}">{{$data->province_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">District:</label>-->
                                <div class="form-box">


                                    <select id="district" name="permanent_district"
                                        class="form-control login-signup rounded-0" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Municipality/Palika:</label>-->
                                <div class="form-box">
                                    <select id="municipality" name="permanent_municipality"
                                        class="form-control login-signup rounded-0" required>
                                    </select>



                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Ward No.:</label>-->
                                <div class="form-box">
                                    <!--<input name="permanent_ward" type="text" class="form-control login-signup"-->
                                    <!--    id="first_field" placeholder="Ward No">-->
                                    <select name="permanent_ward" class="form-control login-signup rounded-0" required>
                                        <option class="d-none" value="">Ward No</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Tole.:</label>-->
                                <div class="form-box">
                                    <input name="permanent_city" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="City" required>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Tole.:</label>-->
                                <div class="form-box">
                                    <input name="permanent_tole" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Tole" required>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Email address</label>-->
                                <div class="form-box">
                                    <input name="email" type="email" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Email Address" aria-label="Email Address"
                                        required>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Phone</label>-->
                                <div class="form-box">
                                    <input name="phone" type="tel" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Phone" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Cell</label>-->
                                <div class="form-box">
                                    <input name="cell" type="tel" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Cell Number" required>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="prev-button btn btn-primary btn_navigation form-group border-0 rounded-0 me-2">Previous</button>
                            <button
                                class="next-button btn btn_green btn_navigation form-group border-0 rounded-0">Next</button>
                        </div>
                        <!--<div class="col-md-2">-->

                        <!--</div>-->
                    </div>

                </div>

                <div class="form-divide">
                    <div class="row">

                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="first_field" class="form-label">Username</label>-->
                                <div class="form-box">
                                    <input name="user_name" type="text" class="form-control login-signup rounded-0"
                                        id="first_field" placeholder="Username" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="second_field" class="form-label">Password</label>-->
                                <div class="form-box position-relative">
                                    <input name="password" type="password" class="form-control rounded-0"
                                        autocomplete="off" id="password" placeholder="Password" aria-label="Password">
                                    <span class="password-toggle-icon pb-3"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="form-group clearfix">
                                <!--<label for="second_field" class="form-label">Confirm Password</label>-->
                                <div class="form-box position-relative">
                                    <input name="cpassword" type="password" class="form-control rounded-0"
                                        autocomplete="off" id="passwords" placeholder="Confirm Password"
                                        aria-label="Password" required>
                                    <span class="password-toggle-icons pb-3"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group clearfix">
                                <div class="form-box position-relative">
                                    <input class="form-check-input" name="agree" type="checkbox" value="1" required>

                                    <label for="form-check-label" class="form-label">I agree to the
                                        <a href="{{url('termscondition')}}" target="_blank"
                                            class="text-greenthemed terms">Terms and Conditions.</a></label>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group clearfix">
                                <div class="form-box position-relative">
                                    @if(config('services.recaptcha.key'))
                                    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>

                            <button
                                class="prev-button btn btn-primary btn_navigation form-group border-0 rounded-0">Previous</button>
                        </div>
                        <div class="form-group clearfix mb-0">
                            @include('admin.auth.error')
                            <button type="submit" class="btn btn_green btn-lg btn-theme">Register</button>
                        </div>
                    </div>
                </div>
                <!--</div>-->
            </form>

            <p class="text-center">Already have an account? <a href="{{url('customerlogin')}}"> Login here</a></p>
        </div>
    </div>
</div>
@endsection

@push("after-scripts")

@endpush