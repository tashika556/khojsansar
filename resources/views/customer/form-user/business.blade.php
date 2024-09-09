@extends('customer/form-user/layout')
@section('page_title','Business Information')
@section('businessactive_class','active')
@section('container')

<div class="col-12">
    <div class="form-business-box">
        <form action="{{ route('updatebusinessform', $customer->id ) }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Summary</label>
                        <textarea name="summary" class="form-control" rows="6" id="">
                            {{ $business->summary ?? '' }}
                        </textarea>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Province</label>
                            <small>
                                <a href="#" id="change-province" class="text-danger"
                                    style="{{ isset($business->state) ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if(isset($business->state))

                        <div class="address-box" id="province-input">
                            {{ $business->stateshow->province_name ?? '' }}
                        </div>
                        <input type="hidden" name="state" id=""
                            value="{{ $business->state }}">
                        <select name="state" id="province" class="form-control login-signup"
                            style="display: none;">
                            <option value="">- - Select Province - -</option>
                            @foreach($provinces as $data)
                            <option value="{{$data->id}}" {{ $data->id == $business->state ? 'selected' : '' }}>
                                {{$data->province_name}}</option>
                            @endforeach
                        </select>
                        @else

                        <select name="state" id="province" class="form-control login-signup">
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
                                <a href="#" id="change-district" class="text-danger"
                                    style="{{ isset($business->district) ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if(isset($business->district))

                        <div class="address-box" id="district-input">
                            {{ $business->districtshow->district_name ?? '' }}
                        </div>
                        <input type="hidden" name="district" id=""
                            value="{{ $business->district }}">
                        <select id="district" name="district" class="form-control login-signup"
                            style="display: none;">

                        </select>

                        @else

                        <select id="district" name="district" class="form-control login-signup">

                        </select>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="exampleFormControlSelect2">Municipality / Palika</label>
                            <small>
                                <a href="#" id="change-municipality" class="text-danger"
                                    style="{{ isset($business->municipality) ? '' : 'display:none;' }}">Change</a>
                            </small>
                        </div>

                        @if(isset($business->municipality))

                        <div class="address-box" id="municipality-input">
                            {{ $business->municipalityshow->municipality_name ?? '' }}
                        </div>
                        <input type="hidden" name="municipality" id="hidden-temporary-muni"
                            value="{{ $business->municipality }}">
                        <select id="municipality" name="municipality" class="form-control login-signup"
                            style="display: none;">

                        </select>

                        @else

                        <select id="municipality" name="municipality" class="form-control login-signup">

                        </select>
                        @endif
                    </div>
                </div>

                <div class="col-xl-2 col-md-4 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Ward</label>
                        <input type="number" class="form-control" name="ward" id="exampleFormControlInput1" value="{{ $business->ward ?? '' }}">
                    </div>
                </div>
                
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Tole</label>
                        <input type="text" class="form-control" name="tole" id="exampleFormControlInput1" value="{{ $business->tole ?? '' }}">
                    </div>
                </div>
                
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Address</label>
                        <input type="text" class="form-control" name="address" id="exampleFormControlInput1" value="{{ $business->address ?? '' }}">
                    </div>
                </div>
                
                <div class="col-md-6 col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="exampleFormControlInput1" value="{{ $business->latitude ?? '' }}">
                    </div>
                </div>
                
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="exampleFormControlInput1" value="{{ $business->longitude ?? '' }}">
                    </div>
                </div>
                
                <div class="col-12">
                    @include('admin.auth.error')
                </div>
                
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="form-group mb-4">
                        <input type="submit" class="btn btn-warning text-white" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
