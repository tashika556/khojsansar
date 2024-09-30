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
                    <input type="hidden" name="removed_slider_images" id="removedSliderImages" value="[]">
                    <input type="hidden" name="removed_gallery_images" id="removedGalleryImages" value="[]">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4 border-bottom pb-4">
                                <label for="slider_photos">Slider Photos or Videos</label><br>
                                <input type="file" name="slider_images[]" id="sliderImagesInput" accept="image/*"
                                    multiple onchange="previewImages(this, 'sliderImagesPreview', 'slider')">
                                <div id="sliderImagesPreview" class="image-preview d-flex">
                                    @foreach($sliderphotos as $photo)
                                    <div class="image-wrapper img-sliders-gallery">
                                        <div class="container__img-holder">
                                            <img src="{{ asset('storage/uploads/slider_photos_videos/' . $photo->photosvideos) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <span class="remove-icon"
                                            onclick="removeImage('{{ $photo->photosvideos }}', 'slider')">&#10060;</span>
                                        <input type="hidden" name="existing_slider_images[]"
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
                                        <div class="container__img-holder">
                                            <img src="{{ asset('storage/uploads/gallery_photos_videos/' . $photo->photosvideos) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <span class="remove-icon"
                                            onclick="removeImage('{{ $photo->photosvideos }}', 'gallery')">&#10060;</span>
                                        <input type="hidden" name="existing_gallery_images[]"
                                            value="{{ $photo->photosvideos }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-danger submit-btn-form" value="Update Photos & Videos">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<script>
let selectedSliderFiles = [];
let selectedGalleryFiles = [];
let removedSliderImages = [];
let removedGalleryImages = [];

function previewImages(input, previewId, type) {
    const preview = document.getElementById(previewId);

    let selectedFiles = type === 'slider' ? selectedSliderFiles : selectedGalleryFiles;

    if (input.files) {

        const newFiles = Array.from(input.files);
        selectedFiles = selectedFiles.concat(newFiles);

        selectedFiles.forEach((file, index) => {

            if (!preview.querySelector(`[data-file-index="${index}"]`)) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = createImageWrapper(e.target.result, file, type, index);
                    preview.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            }
        });

        if (type === 'slider') {
            selectedSliderFiles = selectedFiles;
        } else {
            selectedGalleryFiles = selectedFiles;
        }

        updateInputFile(type);
    }
}

function createImageWrapper(src, file, type, index) {
    const imgWrapper = document.createElement('div');
    imgWrapper.classList.add('image-wrapper', 'img-sliders-gallery');
    imgWrapper.setAttribute('data-file-index', index); 

    const img = document.createElement('img');
    img.src = src;
    img.classList.add('img-thumbnail');
    imgWrapper.appendChild(img);

    const removeIcon = document.createElement('span');
    removeIcon.classList.add('remove-icon');
    removeIcon.innerHTML = '&#10060;';
    removeIcon.onclick = function() {
        imgWrapper.remove();
        removeFile(file, type); 
    };
    imgWrapper.appendChild(removeIcon);

    return imgWrapper;
}

function removeFile(fileToRemove, type) {
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
    const removeInput = document.querySelector(`input[name="existing_${type}_images[]"][value="${imageName}"]`);

    if (removeInput) {
        removeInput.remove();
    }

    const imageWrapper = Array.from(preview.querySelectorAll('.image-wrapper')).find(wrapper => wrapper.querySelector('img').src.includes(imageName));
    if (imageWrapper) {
        imageWrapper.remove();
    }

    if (type === 'slider') {
        removedSliderImages.push(imageName);
    } else if (type === 'gallery') {
        removedGalleryImages.push(imageName);
    }

    updateHiddenFields();
}

function updateHiddenFields() {
    document.getElementById('removedSliderImages').value = JSON.stringify(removedSliderImages);
    document.getElementById('removedGalleryImages').value = JSON.stringify(removedGalleryImages);
}

</script>

@endsection