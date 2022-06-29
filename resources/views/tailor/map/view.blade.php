@extends('tailor.layouts.tailor')

@section('title')
EDIT MAP LOCATION
@endsection

@section('content')
<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col">
                <h5>{{$map->address}}</h5>
            </div>
        </div>
    </div>

    <div class="card-body">


        <form action="{{url('/tailor/update-map/'.$map->id)}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group">
            @csrf
            <div class="row">
            <input type="hidden" name="tailor_id" value="{{Auth::user()->tailor_id}}">

                <label for="address_address">Address</label>


                <div class="col md-4 ">
                <input type="text" id="address-input" name="address" class="form-control map-input">

                    <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                    <input type="hidden" name="longitude" id="address-longitude"
                        value="{{ old('longitude') ?? '0' }}" />
                </div>

                <div class="col md-4">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>

                <div class="col md-4">
                    <input type="text" class="form-control" placeholder="long" name="lng" id="lng">
                </div>
            </div>



            <div class="row">
                <div class="col mt-3">
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>
                </div>
            </div>


        <div class="col-md-4">
            <button type="submit" class="btn btn-success">update</button>
        </div>
        </div>
        </div>
        </div>
@endsection


@section('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
    async defer></script>

<!-- <script src="{{ asset('admin/js/mapiinput.js') }}"></script> -->

<script>
 function initialize() {

$('form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
const locationInputs = document.getElementsByClassName("map-input");

// var searchBox = new google.maps.places.SearchBox(document.getElementById('map-input')); //added myself,may be wrong......for autocomplting

const autocompletes = [];
const geocoder = new google.maps.Geocoder;
for (let i = 0; i < locationInputs.length; i++) {

    const input = locationInputs[i];
    const fieldKey = input.id.replace("-input", "");
    const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

    const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || {{ $map->latitude }};
    const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || {{ $map->longitude }};


    const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
        center: { lat: latitude, lng: longitude },
        zoom: 13,
        scrollwhell: true,
    });

    // google.maps.event.addListener(marker, 'places_changed', //added myself,may be wrong...for autocompleting
    //     function() {
    //         var places = searchBox.getPlaces();
    //         var bounds = new google.maps.LatLngBounds();
    //         var i, place;

    //         for (i = 0; place = places[i]; i++) {
    //             bounds.extend(place.geometry.location);
    //             marker.setPosition(place.geometry.location); //set marker position new
    //         }

    //         map.fitBounds(bounds);
    //         map.setZoom(15);
    //     });

    const marker = new google.maps.Marker({
        map: map,
        position: { lat: latitude, lng: longitude },
        draggable: false,
    });

    // google.maps.event.addListener(marker, 'position_changed',
    //     function() {
    //         let latitude = marker.position.lat()
    //         let longitude = marker.position.lng()
    //         $('#lat').val(latitude)
    //         $('#lng').val(longitude)
    //     });

    // google.maps.event.addListener(map, 'click',
    //     function(event) {
    //         pos = event.latLng
    //         marker.setPosition(pos)
    //     });





    marker.setVisible(isEdit);

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.key = fieldKey;
    autocompletes.push({ input: input, map: map, marker: marker, autocomplete: autocomplete });
}

for (let i = 0; i < autocompletes.length; i++) {
    const input = autocompletes[i].input;
    const autocomplete = autocompletes[i].autocomplete;
    const map = autocompletes[i].map;
    const marker = autocompletes[i].marker;

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        marker.setVisible(false);
        const place = autocomplete.getPlace();

        geocoder.geocode({ 'placeId': place.place_id }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                const lat = results[0].geometry.location.lat();
                const lng = results[0].geometry.location.lng();
                setLocationCoordinates(autocomplete.key, lat, lng);
            }
        });

        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            input.value = "";
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

    });
}
}

function setLocationCoordinates(key, lat, lng) {
const latitudeField = document.getElementById(key + "-" + "latitude");
const longitudeField = document.getElementById(key + "-" + "longitude");
latitudeField.value = lat;
longitudeField.value = lng;
}


</script>
@endsection
