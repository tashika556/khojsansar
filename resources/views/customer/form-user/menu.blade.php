@extends('customer/form-user/layout')
@section('page_title','Menu Information')
@section('menuactive_class','active')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('businessmenustore', $business->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="menu-pdf mb-4">
                    <label for="Menu PDF"><strong>Choose pdf file of your menu (Optional)</strong></label>
                    <input type="file" name="pdf" class="form-control">
                    @if(isset($existingPdf) && $existingPdf->pdf)
                    <div class="mt-3">

                        <a href="{{ asset('storage/' . $existingPdf->pdf) }}" class="text-success" target="_blank">View
                            PDF</a>
                    </div>
                    @endif

                </div>
                @foreach($menuTopics as $topic)
                <div class="menu-topic-section">
                    <h5><strong>{{ $topic->menu_topic }}</strong></h5>

                    <div id="menu-items-{{ $topic->id }}">
                        @foreach($topic->menuItems as $menuItem)
                        <div class="menu-item">
                            <input type="hidden" name="menu_id[{{ $topic->id }}][]" value="{{ $menuItem->id }}">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title[{{ $topic->id }}][]" class="form-control"
                                            value="{{ $menuItem->title }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="caption">Caption:</label>
                                        <input type="text" name="caption[{{ $topic->id }}][]" class="form-control"
                                            value="{{ $menuItem->caption }}">
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" name="price[{{ $topic->id }}][]" class="form-control"
                                            value="{{ $menuItem->price }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group mt-4">
                                        <button type="button" data-topic-id="{{ $topic->id }}"
                                            class="btn btn-primary add-menu-item">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger remove-menu-item">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach

                        @if($topic->menuItems->isEmpty())
                        <div class="menu-item-template">
                            <div class="menu-item">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" name="title[{{ $topic->id }}][]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="caption">Caption:</label>
                                            <input type="text" name="caption[{{ $topic->id }}][]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text" name="price[{{ $topic->id }}][]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group mt-4">
                                            <button type="button" data-topic-id="{{ $topic->id }}"
                                                class="btn btn-primary add-menu-item">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger remove-menu-item">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @endforeach

                @include('admin.auth.error')
                <button type="submit" class="btn btn-success mt-3 submit-btn-form">Submit</button>
            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('click', function(e) {
    let addBtn = e.target.closest('.add-menu-item');
    if (addBtn) {
        let topicId = addBtn.getAttribute('data-topic-id');
        let menuItem = `
            <div class="menu-item">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title[${topicId}][]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="caption">Caption:</label>
                            <input type="text" name="caption[${topicId}][]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" name="price[${topicId}][]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group mt-4">
                            <button type="button" data-topic-id="${topicId}" class="btn btn-primary add-menu-item">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-danger remove-menu-item">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        `;
        document.getElementById('menu-items-' + topicId).insertAdjacentHTML('beforeend', menuItem);
    }

    let removeBtn = e.target.closest('.remove-menu-item');
    if (removeBtn) {
        removeBtn.closest('.menu-item').remove();
    }
});
</script>
@endsection