@include('frontend.header')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="business-search-input">Search Business:</label>
                                <input type="text" class="form-control" id="business-search-input" placeholder="Enter business name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="address-map-container" style="width:100%; height:400px;">
                                <div id="address-map" style="width:100%; height:100%;"></div>
                            </div>
                        </div>
                 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
<script type="text/javascript" src="{{asset('js/nepal-province.js')}}"></script>
<script type="text/javascript" src="{{asset('js/all-districts.js')}}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('address-map').setView([28.3949, 84.124], 8);
    var markerIconUrl = "{{ asset('frontend/img/marking-icon.png') }}";
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    
    }).addTo(map);

    var marker;  

    function searchBusiness(query) {
        fetch(`/search-business?query=${query}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    var lat = parseFloat(data.latitude);
                    var lng = parseFloat(data.longitude);

                    map.setView([lat, lng], 13);

                    if (marker) {
                      
                        marker.setLatLng([lat, lng]);
                    } else {
               
                        var customIcon = L.divIcon({
                            className: 'custom-icon',
                            html: '<img src="' + markerIconUrl + '" style="width: 30px; height: 45px;">',
                         
                        });

                        marker = L.marker([lat, lng], {
                            icon: customIcon
                        }).addTo(map);
                    }

                    marker.bindPopup(`<b>${data.business_name}</b><br>${data.address}`).openPopup();
                }
            })
            .catch(error => console.error('Error:', error));
    }

    document.getElementById("business-search-input").addEventListener("change", function () {
        var query = this.value;
        if (query) {
            searchBusiness(query);
        } else {
            alert("Please enter a valid business name.");
        }
    });
});

</script>
@include('frontend.footer')

