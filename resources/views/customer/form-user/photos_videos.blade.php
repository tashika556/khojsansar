@extends('customer/form-user/layout')
@section('page_title','Photos & Videos Information')
@section('photosactive_class','active')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-white p-4">
                <form action="{{ route('businessphotosvideosstore', $business->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4 border-bottom pb-4">
                                <label for="slider_photos">Slider Photos or Videos</label><br>
                                <input type="file" name="slider_images[]" id="sliderImagesInput" accept="image/*"
                                    multiple onchange="previewImages(this, 'sliderImagesPreview', 'slider')">
                                <div id="sliderImagesPreview" class="image-preview d-flex">
                                    @foreach($sliderphotos as $photo)
                                    <div class="image-wrapper img-sliders-gallery">
                                        <img src="{{ asset('storage/uploads/slider_photos_videos/' . $photo->photosvideos) }}"
                                            class="img-thumbnail">
                                        <span class="remove-icon"
                                            onclick="removeImage('{{ $photo->photosvideos }}', 'slider')">&#10060;</span>
                                        <input type="hidden" name="removed_slider_images[]"
                                            value="{{ $photo->photosvideos }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-4 border-bottom pb-4">
                                <label for="gallery_photos">Gallery Photos or Videos</label><br>
                                <input type="file" name="gallery_images[]" id="galleryImagesInput" accept="image/*"
                                    multiple onchange="previewImages(this, 'galleryImagesPreview', 'gallery')">


                                <div id="galleryImagesPreview" class="image-preview d-flex">
                                    @foreach($galleryphotos as $photo)
                                    <div class="image-wrapper img-sliders-gallery">
                                        <img src="{{ asset('storage/uploads/gallery_photos_videos/' . $photo->photosvideos) }}"
                                            class="img-thumbnail">
                                        <span class="remove-icon"
                                            onclick="removeImage('{{ $photo->photosvideos }}', 'gallery')">&#10060;</span>
                                        <input type="hidden" name="removed_gallery_images[]"
                                            value="{{ $photo->photosvideos }}">
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    @include('admin.auth.error')
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Update Photos & Videos">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let selectedSliderFiles = [];
let selectedGalleryFiles = [];

function previewImages(input, previewId, type) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = ''; // Clear previous preview for the specific type

    let selectedFiles = type === 'slider' ? selectedSliderFiles : selectedGalleryFiles;

    if (input.files) {
        for (let i = 0; i < input.files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgWrapper = createImageWrapper(e.target.result, input.files[i], type);
                preview.appendChild(imgWrapper);
            };
            reader.readAsDataURL(input.files[i]);
        }

        // Store the selected files in the correct array based on type
        if (type === 'slider') {
            selectedSliderFiles = Array.from(input.files);
        } else {
            selectedGalleryFiles = Array.from(input.files);
        }
    }
}

function createImageWrapper(src, file, type) {
    const imgWrapper = document.createElement('div');
    imgWrapper.classList.add('image-wrapper', 'img-sliders-gallery');

    const img = document.createElement('img');
    img.src = src;
    img.classList.add('img-thumbnail');
    imgWrapper.appendChild(img);

    const removeIcon = document.createElement('span');
    removeIcon.classList.add('remove-icon');
    removeIcon.innerHTML = '&#10060;';
    removeIcon.onclick = function() {
        imgWrapper.remove();
        removeFile(file, type); // Remove the file correctly based on its type
    };
    imgWrapper.appendChild(removeIcon);

    return imgWrapper;
}

function removeFile(fileToRemove, type) {
    // Remove the file from the respective array and update the input file
    if (type === 'slider') {
        selectedSliderFiles = selectedSliderFiles.filter(file => file !== fileToRemove);
        updateInputFile('slider');
    } else if (type === 'gallery') {
        selectedGalleryFiles = selectedGalleryFiles.filter(file => file !== fileToRemove);
        updateInputFile('gallery');
    }
}

function updateInputFile(type) {
    const input = type === 'slider' ? document.getElementById('sliderImagesInput') : document.getElementById('galleryImagesInput');
    const dataTransfer = new DataTransfer();
    const files = type === 'slider' ? selectedSliderFiles : selectedGalleryFiles;
    files.forEach(file => dataTransfer.items.add(file));
    input.files = dataTransfer.files;
}

function removeImage(imageName, type) {
    const preview = document.getElementById(`${type}ImagesPreview`);
    const removeInput = document.querySelector(`input[name="removed_${type}_images[]"][value="${imageName}"]`);

    if (removeInput) {
        removeInput.remove();
    }

    const imageWrapper = Array.from(preview.querySelectorAll('.image-wrapper')).find(wrapper => wrapper.querySelector('img').src.includes(imageName));
    if (imageWrapper) {
        imageWrapper.remove(); 
    }
}


</script>

@endsection