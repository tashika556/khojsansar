@extends('customer/form-user/layout')
@section('page_title','Photos & Videos Information')
@section('photosactive_class','active')

@section('container')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-white p-4">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="row">


                        <div class="col-12">
                            <div class="form-group image-preview mb-4 border-bottom pb-4">
                                <label for="title">Slider Photos or Video </label><br>
                                <input type="file" name="images[]" accept="image/*" multiple>

                                <div class="relative image-container">
                                    <img src="" alt="Gallery Image">
                                    <span class="remove-icon remove-image-btn" data-image-id=""><i class="fa fa-times"
                                            aria-hidden="true"></i></span>

                                </div>

                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group image-preview mb-4 border-bottom pb-4">
                                <label for="title">Gallery Photos or Video </label><br>
                                <input type="file" name="images[]" accept="image/*" multiple>

                                <div class="relative image-container">
                                    <img src="" alt="Gallery Image">
                                    <span class="remove-icon remove-image-btn" data-image-id=""><i class="fa fa-times"
                                            aria-hidden="true"></i></span>

                                </div>

                            </div>
                        </div>
                    </div>       @include('admin.auth.error')
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Update Gallery">
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
