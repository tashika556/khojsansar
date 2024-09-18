<a id="button">Go To Top</a>

<section class="contact-area">

    <div class="footer-overlay"></div>

    <div class="footer-top-area">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Contact Us</h5>
                    <p>
                        <a href="tel:+977-01-5453000">+977-01-5453000, +977-9803030780</a>

                    </p>
                    <p><a href="mailto:info@khojsansar.com">info@khojsansar.com</a></p>
                    <div class="contact-social d-flex justify-content-center">
                        <ul>
                            <li><a class="hover-target" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="hover-target" href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Address</h5>
                    <p>kumaripati - 5 <br> Lalitpur Metropolitan, Lalitpur ,Nepal</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-top-area-item text-center">
                    <h5>Opening Hours</h5>
                    <p>Everyday : From 12.30 To 23.00<br>Kitchen Closes At 22.00</p>
                    <p class="text-center text-white">We Accept</p>

                    <div class="d-flex align-items-center justify-content-center ">
                        <img src="img/accepts.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom-area">

        <div class="footer-bottom-middle footer-px">
            <a href="index.php">
                <img src="img/logo.png" alt="">
            </a>
        </div>
        <div class="footer-bottom-down footer-px">
            <div class="d-flex justify-content-between">
                <div class="footer-bottom-down-left">
                    <p>Copyright © 2023 Nepal Restro.</p>
                </div>
                <div class="footer-bottom-down-right">
                    <p>Website by: <a href="">DigiSoft Developers</a></p>
                </div>
            </div>
        </div>
    </div>

</section>

@stack('before-scripts')

<script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script type="text/javascript" src="{{asset('frontend/js/nepal-province.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/all-districts.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="{{ URL::asset('frontend/js/jquery-1.12.4.min.js')}}"></script>

<script src="{{ URL::asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('frontend/js/slick.js')}}"></script>
<script src="{{ URL::asset('frontend/js/slick-animation.min.js')}}"></script>
<script src="{{ URL::asset('frontend/js/wow.js')}}"></script>
<script src="{{ URL::asset('frontend/js/font-awesom.js')}} "></script>
<script src="{{ URL::asset('frontend/js/typed.min.js')}}"
    integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.js"></script>
<script src="{{ URL::asset('frontend/js/main.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#province').on('change', function() {
        var provinceId = $(this).val();
        $("#district").html('<option value="">Select District</option>');
        $.ajax({
            url: "{{ url('/getDistrict') }}",
            type: "POST",
            data: {
                province_id: provinceId,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(res) {
                $('#district').html('<option value="">Select District</option>');
                $.each(res.districts, function(key, value) {
                    $("#district").append('<option value="' + value.id + '">' + value.district_name + '</option>');
                });
            }
        });
    });

    $('#district').on('change', function() {
        var districtId = $(this).val();
        $("#municipality").prop('disabled', false).html('<option value="">Select Municipality</option>');
        $.ajax({
            url: "{{ url('/getMunicipality') }}",
            type: "POST",
            data: {
                district_id: districtId,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(res) {
                $("#municipality").html('<option value="">Select Municipality</option>');
                $.each(res.municipalities, function(key, value) {
                    $("#municipality").append('<option value="' + value.id + '">' + value.municipality_name + '</option>');
                });
            
            }
        });
    });
    $('#municipality').on('change', function() {
    var municipalityId = $(this).val();
    $("#category").prop('disabled', false).html('<option value="">Select Category</option>');
    $.ajax({
        url: "{{ url('/getCategories') }}", 
        type: "POST",
        data: {
            municipality_id: municipalityId,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(res) {
            $("#category").html('<option value="">Select Category</option>');
            $.each(res.categories, function(key, value) {
                $("#category").append('<option value="' + value.id + '">' + value.category_name + '</option>');
            });
        }
    });
});
$('#search-button').on('click', function(e) {
    e.preventDefault(); 

    var categoryId = $('#category').val();
    var municipalityId = $('#municipality').val(); 

    $('#category_id').val(categoryId);
    $('#municipality_id').val(municipalityId);

    $('#search-form').submit();
});

});

function filterByCategory() {
    const categoryId = document.getElementById('category-list').value;
    const municipalityId = "{{ isset($municipalityId) ? $municipalityId : request()->input('municipality_id') }}";

    window.location.href = `?category_id=${categoryId}&municipality_id=${municipalityId}`;
}

document.getElementById('category-list').addEventListener('change', function() {
    filterByCategory();
});


$(document).ready(function() {
    $('#search-input').on('input', function() {
        let searchQuery = $(this).val();
        let filterForm = $('#filter-form');

        $.ajax({
            url: filterForm.attr('action'),
            method: 'GET',
            data: filterForm.serialize() + '&search=' + searchQuery,
            success: function(response) {
                $('#restaurant-list').html(response.html);
                $('.pagination').html(response.pagination);
            }
        });
    });
});
</script>
@stack('after-scripts')


</body>

</html>