@extends('admin/layout')
@section('page_title','Admin login')
@section('container')
<div class="row authentication authentication-cover-main mx-0">
    <div class="col-xxl-5 col-xl-5 col-lg-12 d-xl-block d-none px-0">
        <div class="authentication-cover overflow-hidden">
            <div class="authentication-cover-logo">
                <a href="index.html">
                    <img src="{{ asset('sitesetting/logo/' . $sitesetting->logo) }}" style="height:156px; width:200px; "alt=""
                        class="authentication-brand desktop-dark">
                </a>
            </div>
            <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                <div>
                    <h2 class="fs-1 text-fixed-white lh-base text-center">{{ $sitesetting->site_title }}</h2>
                    <p class="lh-base text-fixed-white op-8 text-center mb-5">{{ $sitesetting->caption }}.
                    </p>
                    <div class="contact-box mt-5">
                        <h3 class="mb-0 mt-4 lh-base text-fixed-white op-9 text-center">Contact Information</h3>
                        <p class="mb-0 mt-2 lh-base text-fixed-white op-8 text-center"><i class="fa fa-map-marker"
                                aria-hidden="true"></i> {{ $contact->address_one }}, {{ $contact->address_two}}</p>
                        <p class="mb-0 mt-2 lh-base text-fixed-white op-8 text-center"><i class="fa fa-phone"
                                aria-hidden="true"></i> {{ $contact->phone_one }}</p>
                        <p class="mb-0 mt-2 lh-base text-fixed-white op-8 text-center"><i class="fa fa-envelope"
                                aria-hidden="true"></i> {{ $contact->email_one }}</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col-xxl-7 col-xl-7 bg-light-green">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-xxl-6 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                <div class="card custom-card shadow-none my-auto border-0">
                    <div class="card-body login-box p-5">
                        <p class="h4 mb-2 fw-semibold text-greenthemed">Sign In</p>
                        <p class="mb-4 text-muted fw-normal">Welcome back Admin !</p>
                        <form method="POST" action="{{ route('authadmin') }}">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">User Name</label>
                                    <input type="text" class="form-control form-control-lg" id="signin-username"
                                        placeholder="user name" name="username">
                                </div>
                                <div class="col-xl-12 mb-2">
                                 
                                    <div class="position-relative">
                                    <label for="signin-userpassword" class="form-label text-default">Password</label>
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            id="signin-password" placeholder="password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <input type="submit" class="btn btn-lg btn-primary btn-green" value="Sign in">

                            </div>
                            @include('admin.auth.error')
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection