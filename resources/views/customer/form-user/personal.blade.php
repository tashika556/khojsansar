@extends('customer/form-user/layout')
@section('page_title','Personal Information')
@section('personalactive_class','active')
@section('container')


<div class="col-12">
    <div class="form-customer-box">
        <form method="POST" enctype="multipart/form-data" action="{{ url('/personalform/' . $customer->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput1">Authorize</label>
                        <select name="authorize" class="form-control login-signup" id="">
                            <option value="{{$customer->authorize}}">
                                {{$customer->authorizeshow->authorize_name}}</option>
                            <option value="">Select Authorize</option>
                            @foreach($authorizes as $data)
                            <option value="{{$data->id}}">{{$data->authorize_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Business / Organization
                            Name:</label>
                        <input type="text" class="form-control" name="business" id="exampleFormControlInput1"
                            value="{{ $customer->business }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Category</label>
                        <select name="category" class="form-control login-signup" id="">
                            <option value="{{$customer->category}}">
                                {{$customer->categoryshow->category_name}}</option>
                            <option value="">Select Catgeory</option>
                            @foreach($category as $data)
                            <option value="{{$data->id}}">{{$data->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="exampleFormControlInput1"
                            value="{{ $customer->first_name }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" id="exampleFormControlInput1"
                            value="{{ $customer->middle_name }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="exampleFormControlInput1"
                            value="{{ $customer->last_name }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleFormControlInput1"
                            value="{{ $customer->email }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleFormControlInput1"
                            value="{{ $customer->phone }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Cell</label>
                        <input type="text" class="form-control" name="cell" id="exampleFormControlInput1"
                            value="{{ $customer->cell }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Address:</label>
                        <input type="text" class="form-control" name="address" id="exampleFormControlInput1"
                            value="{{ $customer->address }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mx-auto text-center">
                        <h5><strong>Permanent Address</strong></h5>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Province</label>
                            <small><a href="#" id="change-province" class="text-danger">Change</a></small>
                        </div>

                        <div class="address-box" id="province-input">{{ $customer->permanentState->province_name }}
                        </div>
                        <input type="hidden" name="permanent_state" id="hidden-permanent-state"
                            value="{{ $customer->permanent_state }}">



                        <select name="permanent_state" id="province" class="form-control login-signup"
                            style="display: none;">
                            <option value="">- - Select Province - -</option>
                            @foreach($provinces as $data)
                            <option value="{{$data->id}}">{{$data->province_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">District</label>
                            <small><a href="#" id="change-district" class="text-danger">Change</a></small>
                        </div>
                        <div class="address-box" id="district-input">{{ $customer->permanentDistrict->district_name  }}
                        </div>
                        <input type="hidden" name="permanent_district" id="hidden-permanent-district"
                            value="{{ $customer->permanent_district }}">




                        <select id="district" name="permanent_district" class="form-control login-signup"
                            style="display: none;">

                        </select>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Municipality / Palika</label>
                            <small><a href="#" id="change-municipality" class="text-danger">Change</a></small>
                        </div>

                        <div class="address-box" id="municipality-input">
                            {{ $customer->permanentMunicipality->municipality_name  }}</div>
                        <input type="hidden" name="permanent_municipality" id="hidden-permanent-muni"
                            value="{{ $customer->permanent_municipality }}">



                        <select id="municipality" name="permanent_municipality" class="form-control login-signup"
                            style="display: none;">

                        </select>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Ward</label>
                        <input type="number" class="form-control" name="permanent_ward" id="exampleFormControlInput1"
                            value="{{ $customer->permanent_ward }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Tole</label>
                        <input type="text" class="form-control" name="permanent_tole" id="exampleFormControlInput1"
                            value="{{ $customer->permanent_tole }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">City</label>
                        <input type="text" class="form-control" name="permanent_city" id="exampleFormControlInput1"
                            value="{{ $customer->permanent_city }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mx-auto text-center">
                        <h5><strong>Temporary Address</strong></h5>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Province</label>
                            <small>
                                <a href="#" id="change-temp-province" class="text-danger"
                                    style="{{ $customer->temporary_state ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if($customer->temporary_state)

                        <div class="address-box" id="temp-province-input">
                            {{ $customer->temporaryState->province_name }}
                        </div>
                        <input type="hidden" name="temporary_state" id="hidden-temporary-state"
                            value="{{ $customer->temporary_state }}">
                        <select name="temporary_state" id="provinces" class="form-control login-signup"
                            style="display: none;">
                            <option value="">- - Select Province - -</option>
                            @foreach($provinces as $data)
                            <option value="{{$data->id}}">{{$data->province_name}}</option>
                            @endforeach
                        </select>
                        @else

                        <select name="temporary_state" id="provinces" class="form-control login-signup">
                            <option value="">- - Select Province - -</option>
                            @foreach($provinces as $data)
                            <option value="{{$data->id}}">{{$data->province_name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">District</label>
                            <small>
                                <a href="#" id="change-temp-district" class="text-danger"
                                    style="{{ $customer->temporary_district ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if($customer->temporary_district)

                        <div class="address-box" id="temp-district-input">
                            {{ $customer->temporaryDistrict->district_name }}
                        </div>
                        <input type="hidden" name="temporary_district" id="hidden-temporary-district"
                            value="{{ $customer->temporary_district }}">
                        <select id="districts" name="temporary_district" class="form-control login-signup"
                            style="display: none;">

                        </select>

                        @else

                        <select id="districts" name="temporary_district" class="form-control login-signup">

                        </select>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Municipality / Palika</label>
                            <small>
                                <a href="#" id="change-temp-muni" class="text-danger"
                                    style="{{ $customer->temporary_municipality ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if($customer->temporary_municipality)

                        <div class="address-box" id="temp-muni-input">
                            {{ $customer->temporaryMunicipality->municipality_name }}
                        </div>
                        <input type="hidden" name="temporary_municipality" id="hidden-temporary-muni"
                            value="{{ $customer->temporary_municipality }}">
                        <select id="municipalitys" name="temporary_municipality" class="form-control login-signup"
                            style="display: none;">

                        </select>

                        @else

                        <select id="municipalitys" name="temporary_municipality" class="form-control login-signup">

                        </select>
                        @endif
                    </div>
                </div>

      
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Ward</label>
                        <input type="number" class="form-control" name="temporary_ward" id="exampleFormControlInput1"
                            value="{{ $customer->temporary_ward }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Tole</label>
                        <input type="text" class="form-control" name="temporary_tole" id="exampleFormControlInput1"
                            value="{{ $customer->temporary_tole }}">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">City</label>
                        <input type="text" class="form-control" name="temporary_city" id="exampleFormControlInput1"
                            value="{{ $customer->temporary_city }}">
                    </div>
                </div>
                <div class="col-xl-4"></div>                <div class="col-12">
@include('admin.auth.error')
</div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                 
                        <input type="submit" class="btn btn-warning text-white submit-btn-form" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>

    </section>

    @endsection