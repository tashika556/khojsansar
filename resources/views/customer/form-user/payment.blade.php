@extends('customer/form-user/layout')
@section('page_title','Payment Information')
@section('paymentactive_class','active')
@section('container')

<div class="col-12">
    <div class="form-business-box">

        <div class="row">

            <div class="col-12">
                <div class="title-payment mb-4">
                    <strong>Please complete the payment to display your business on site.</strong>
                </div>
                <div class="price mb-4">
                    <div class="text-danger"><strong>Price: </strong> Rs.1000</div>
                </div>
                <div class="col-12">
                    <div class="payment-details">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <strong>Bank Name:</strong> {{ $paymentmethod->accountholder_bank_name }}
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong>Account Holder Name:</strong> {{ $paymentmethod->accountholder_name }}
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong>Account Number:</strong> {{ $paymentmethod->accountholder_number }}
                            </div>

                            <div class="col-md-4 mb-4">
                                <strong>Branch:</strong> {{ $paymentmethod->accountholder_branch }}
                            </div>
                            <div class="col-md-8 mb-4">
                                <div class="d-flex">

                                    <strong>You can also scan QR Code to pay </strong>
                                    <div class="qr-imgs">
                                        @if($paymentmethod->qr_photo)
                                        <img src="{{ asset('storage/' . $paymentmethod->qr_photo) }}" alt="QR Photo"
                                            class="img-thumbnail" style="max-width: 150px;">
                                        @else
                                        <p>No QR photo uploaded.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                            <form action="{{ route('updatebusinesspaymentform', $customer->id) }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <input type="checkbox" name="payment_confirmation"
                                                    id="payment_confirmation" value="1" @if(isset($payment) &&
                                                    $payment->payment_confirmation == 1) checked @endif
                                                required>
                                                <label for="payment_confirmation"><strong>Please tick this after you
                                                        have done your required payment!</strong></label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="payment_receipt"><strong>Please upload the receipt of
                                                        your
                                                        payment.</strong></label>
                                                <input type="file" name="payment_receipt" id="payment_receipt">
                                                <div class="qr-imgs mt-4">
                                                    @if(isset($payment) && $payment->payment_receipt)
                                                    <img src="{{ asset('uploads/payment_receipt/' . $payment->payment_receipt) }}"
                                                        alt="Payment Receipt" class="img-thumbnail"
                                                        style="max-width: 150px;">
                                                    @else
                                                    <p>No receipt uploaded.</p>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            @include('admin.auth.error')
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-warning text-white submit-btn-form"
                                                value="Submit Payment">
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>

    </div>
</div>

@endsection