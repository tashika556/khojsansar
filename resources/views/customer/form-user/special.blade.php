@extends('customer/form-user/layout')
@section('page_title','Special Information')
@section('specialactive_class','active')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('businessspecialstore', $business->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="menu-topic-section special-info">
                    <h4>Special</h4>
                    <h5><strong>Maximum 5 Special Items</strong></h5>

                    <div id="special-items-container">
                        @foreach ($specials as $index => $special)
                        <div class="menu-item">
                            <div class="row"> <input type="hidden" name="special_id[]" value="{{ $special->id }}">
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="special_name">Special Name:</label>
                                        <input type="text" name="special_name[]" class="form-control"
                                            value="{{ $special->special_name }}" required>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="short_detail">Short Detail:</label>
                                        <input type="text" name="short_detail[]" class="form-control"
                                            value="{{ $special->short_detail }}" required>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" name="price[]" class="form-control"
                                            value="{{ $special->price }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="photo">Photo:</label>
                                        <input type="file" name="photo[]" class="form-control">
                                        <div class="container__img-holder img-view-small">
                                            <img src="{{ asset('storage/' . $special->photo) }}" alt="cover_image"
                                                width="200" style="margin-top:10px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-danger remove-special-item"
                                            data-id="{{ $special->id }}">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>

                    @if ($specials->count() < 5) <div id="add-new-item-section">
                        <button type="button" class="btn btn-primary add-special-item" id="add-special-item">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Special
                        </button>
                </div>
                @else
                <p class="text-danger">You have already added 5 special items. You can edit them but cannot add more.
                </p>
                @endif
        </div>

        @include('admin.auth.error')
        <button type="submit" class="btn btn-success mt-3 submit-btn-form">Submit</button>
        </form>
    </div>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let specialCount = {
        {
            $specials - > count()
        }
    };
    const maxSpecials = 5;

    document.getElementById('add-special-item')?.addEventListener('click', function() {
        if (specialCount >= maxSpecials) {
            alert('You can add up to 5 special items only.');
            return;
        }

        let newItem = `
                <div class="menu-item">
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="special_name">Special Name:</label>
                                <input type="text" name="special_name[]" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="short_detail">Short Detail:</label>
                                <input type="text" name="short_detail[]" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" name="price[]" class="form-control" required>
                            </div>
                        </div>
                         <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="photo">Photo:</label>
                                            <input type="file" name="photo[]" class="form-control">
                                      
                                        </div>
                                    </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group mt-4">
                                <button type="button" class="btn btn-danger remove-special-item">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            `;

        document.getElementById('special-items-container').insertAdjacentHTML('beforeend', newItem);
        specialCount++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-special-item')) {
            e.target.closest('.menu-item').remove();
            specialCount--;
        }
    });
});
</script>
@endsection