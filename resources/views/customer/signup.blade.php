@extends('customer/auth-layout')
@section('page_title','KhojSansar Register')
@section('container')
@section('col_class','col-xl-7 col-lg-7')
@section('colcreate_class','col-xl-5 col-lg-5')
<div class="form-section">
    <div class="logo">
        <a href="login-6.html">
            <img src="{{ URL::asset('admin/images/brand-logos/digi-logo.png')}}" alt="logo">
        </a>
    </div>
    <h6 class="text-white text-center">Customer Signup</h6>
    <h3>Create Your Account</h3>
    <div class="login-inner-form">
        <form action="#" method="GET">
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
                        <label for="business" class="form-label">Business / Organization Name: <span class="text-span">*</span></label>
                        <div class="form-box">
                            <input name="business" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Business / Organiztion Name">


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


                            <select id="district" name="district" class="form-control login-signup">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Municipality/Palika:</label>
                        <div class="form-box">
                        <select id="municipality" name="municipality" class="form-control login-signup">

</select>
                   


                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Ward No.:</label>
                        <div class="form-box">
                            <input name="business" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Last Name">


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Tole.:</label>
                        <div class="form-box">
                            <input name="business" type="text" class="form-control login-signup" id="first_field"
                                placeholder="Last Name">


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
                            <input name="email" type="email" class="form-control login-signup" id="first_field"
                                placeholder="Email Address" aria-label="Email Address">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Cell</label>
                        <div class="form-box">
                            <input name="email" type="email" class="form-control login-signup" id="first_field"
                                placeholder="Email Address" aria-label="Email Address">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="first_field" class="form-label">Username</label>
                        <div class="form-box">
                            <input name="email" type="email" class="form-control login-signup" id="first_field"
                                placeholder="Email Address" aria-label="Email Address">

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="second_field" class="form-label">Password</label>
                        <div class="form-box position-relative">
                            <input name="password" type="password" class="form-control" autocomplete="off"
                                id="password" placeholder="Password" aria-label="Password">
                                <span class="password-toggle-icon pb-3"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group clearfix">
                        <label for="second_field" class="form-label">Confirm Password</label>
                        <div class="form-box position-relative">
                            <input name="password" type="password" class="form-control" autocomplete="off"
                            id="passwords" placeholder="Password" aria-label="Password">
                            <span class="password-toggle-icons pb-3"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group clearfix mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-theme">Register</button>
                </div>
            </div>
        </form>

        <p class="text-center">Already have an account?<a href="{{url('customerlogin')}}"> Login here</a></p>
    </div>
</div>


@endsection

@push("after-scripts")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#province').on('change', function() {
        var idpradesh = this.value;
        $("#district").html('');
        $.ajax({
            url: "{{url('/getDistrict')}}",
            type: "POST",
            data: {
                province_id: idpradesh,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('#district').html(' <option value="">Select District-</option>>');
                $.each(res.districts, function(key, value) {
                    $("#district").append('<option value="' + value
                        .id + '">' + value.district_name + '</option>');
                });


            }
        });
    });
    $('#district').on('change', function() {
        var idDistrict = this.value;
        $("#municipality").html('');
        $.ajax({
            url: "{{url('/getMunicipality')}}",
            type: "POST",
            data: {
                district_id: idDistrict,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#municipality').html(
                    '<option value="">Select Palika:-</option>');
                $.each(result.municipalities, function(key, value) {
                    $("#municipality").append('<option value="' + value
                        .id + '">' + value.municipality_name + '</option>');
                });
            }
        });
    });
});
</script>
@endpush