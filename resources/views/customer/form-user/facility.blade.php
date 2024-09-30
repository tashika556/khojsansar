@extends('customer/form-user/layout')
@section('page_title','Facility Information')
@section('facilityactive_class','active')
@section('container')

<div class="col-12">
    <div class="form-business-box">
    <form action="{{ route('updatebusinessfacilityform', $business->customer ) }}" method="POST">
    @csrf
            <div class="row">

                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect2"><strong>Could you please indicate which facilities your business offers ?</strong></label>
                        <div class="form-check">
                            @foreach($facilities as $facility)
                                <div class="custom-checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" id="facility{{ $facility->id }}" name="facilities[]" value="{{ $facility->id }}"
                                    {{ $business->facilities->contains($facility->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="facility{{ $facility->id }}">
                                        {{ $facility->facility_name }}
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
