@extends('customer/form-user/layout')
@section('page_title','Service Information')
@section('serviceactive_class','active')
@section('container')

<div class="col-12">
    <div class="form-business-box">
    <form action="{{ route('updatebusinessserviceform', $business->customer ) }}" method="POST">
    @csrf
            <div class="row">

                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2"><strong>Could you please indicate which services your business offers ?</strong></label>
                        <div class="form-check">
                            @foreach($services as $service)
                                <div class="custom-checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" id="service{{ $service->id }}" name="services[]" value="{{ $service->id }}"
                                    {{ $business->services->contains($service->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="service{{ $service->id }}">
                                        {{ $service->service_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

              
                
                <div class="col-12">
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
</div>

@endsection
