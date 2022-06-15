@extends('dashboard.user.inc.front')

@section('title', $unique_tailor->tailor_name)


@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="{{url('/user/add-rating')}}" method="POST">
                <!--form tag for the modal   -->

                @csrf
                <input type="hidden" value="{{ $unique_tailor->tailor_id }}" name="tailor_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{  $unique_tailor->tailor_name }} </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">

                            @if ($user_rating)
                            @for ($i=1; $i<= $user_rating->stars_rated; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>

                                @endfor
                                @for ($j=$user_rating->stars_rated+1; $j<=5; $j++) <input type="radio" value="{{$j}}"
                                    name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>

                                    @endfor

                                    @else

                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>

                                    @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Profile</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
            <div class="span2">
      <img src="{{asset(''.$unique_tailor->avator)}}"  alt="image here" class="card-img-top2 " width="100%" height="90%" >
    </div>
    </div>
            <div class="col-md-8">
    <div class="span4">
      <blockquote>
        <p>{{ $unique_tailor->tailor_name }}</p>
        <hr>

        <small><cite title="Source Title"> {{  $unique_tailor->city }},
    {{  $unique_tailor->region }}
    <hr>

      </blockquote>
      <p>
        <i class="icon-envelope"></i> {{ $unique_tailor->email }}
      </p>

      <hr>
      <i class="icon-gift"></i>Joined: {{date('F ,Y',strtotime ($unique_tailor->created_at))}}
      <hr>

      @php
            $ratenum=number_format($rating_value)
            @endphp
            <div class="rating">
                @for ($i=1; $i<= $ratenum; $i++) <i class="fa fa-star checked"></i>
                    @endfor
                    @for ($j=$ratenum+1; $j<=5; $j++) <i class="fa fa-star"></i>
                        @endfor

                        <span>
                            @if ($ratings->count() > 0)
                            {{$ratings->count()}} Ratings

                            @else
                            No ratings
                            @endif
                        </span>


            </div>

    </div>

    </div>
                <!-- <div class="col-md-4 ">
                    <div class="bg-image hover-zoom">
                        <img src="{{asset(''.$unique_tailor->avator)}}" class="w-100 img-fluid" alt="image here">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-mb-0">
                        <h2> {{ $unique_tailor->tailor_name }}</h2>
                    </div>
                    <hr>
                    <div class="mb-0">
                        <h6>{{$unique_tailor->phone}}</h6>
                    </div> -->
    </div>
    <div class="col-md-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Rate this tailor</button>

            </div>
            </div>

            <div class="col-md-12">

                    <h4><a href="{{url('/user/gallery/'.$unique_tailor->tailor_id)}}">GALLERY</h4>
                </a>

            </div>

            <div class="col-md-12">
                <!-- <a href="{{url('/user/product/'.$unique_tailor->tailor_id)}}"><h4>PRODUCTS</h4></a> -->

            </div>


        </div>
    </div>



</div>


<!--
@if (count($tailor_product)>2)
<div class="container">
    <div class="row">
    <h4 class="py-2 ">PRODUCTS</h4>
    <div class="owl-carousel featured-carousel owl-theme">
        @foreach ($tailor_product as $product)
        <div class="item">
            <div class="card">

                <a href="{{url('/user/view-product/'.$product->categories->slug.'/'.$product->slug)}}">

                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" width="100%"
                        height="100%" alt="image here">
                    <div class="card-body">
                        <h5>{{$product->name}}</h5>

                        <span class="float-start">{{$product->selling_price}}</span>
                        <span class="float-end "><s>{{ $product->original_price }}</s></span>
                    </div>
            </div>

        </div>


        @endforeach
    </div>
</div>
</div>

@elseif (count($tailor_product)>0)
<div class="container">
    <h4 class="py-2  ">PRODUCTS</h4>
    <div class="row">

        @foreach ($tailor_product as $product)
        <div class="col-md-4 mb-3">
            <a href="{{url('/user/view-product/'.$product->categories->slug.'/'.$product->slug)}}">
                <div class="card">

                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" width="100%"
                        height="100%" alt="image here">

                    <div class="card-body">
                        <h5>{{$product->name}}</h5>

                        <span class="float-start">{{$product->selling_price}}</span>
                        <span class="float-end "><s>{{ $product->original_price }}</s></span>
                    </div>
                </div>
            </a>


        </div>

        @endforeach
    </div>
</div>



@else
<div class="container">
    <div class="row">
        <div class="card shadow">
            <h5>no products yet</h5>
        </div>
    </div>
</div>

@endif -->

@if (count($unique_tailor->maps)>0)
<div class="container">
<div class="card">
    <div class="card-body">
            <div class="row">

                <h4>MAP LOCATION</h4>


                <div class="col md-4 ">
                <input type="hidden" id="address-input" name="address" class="form-control map-input">

                    <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                    <input type="hidden" name="longitude" id="address-longitude"
                        value="{{ old('longitude') ?? '0' }}" />
                </div>

                <div class="col md-4">
                    <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>

                <div class="col md-4">
                    <input type="hidden" class="form-control" placeholder="long" name="lng" id="lng">
                </div>
            </div>



            <div class="row">
                <div class="col mt-3">
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        @else
        <div class="container">
            <div class="card">
                <div class="card-header">
                <div class="row">
                <h4>LOCATION</h4>
                <h7 style="color:red">No Map location available at the moment</h7>
            </div>
                </div>
            </div>

        </div>
        @endif

@endsection


@section('scripts')

@if (count($unique_tailor->maps)>0)
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



const autocompletes = [];
const geocoder = new google.maps.Geocoder;
for (let i = 0; i < locationInputs.length; i++) {

    const input = locationInputs[i];
    const fieldKey = input.id.replace("-input", "");
    const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

    const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || {{ $tailor_map->latitude }};
    const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || {{ $tailor_map->longitude }};


    const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
        center: { lat: latitude, lng: longitude },
        zoom: 13,
        scrollwhell: true,
    });


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
@endif

<script>
    $(document).ready(function () {
        $('.featured-carousel').owlCarousel({
    loop: true,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 2000,
    margin: 10,

    responsive: {
        0: {
            items: 1,
            dots: false
        },
        600: {
            items: 3,
            dots: false
        },

        1000: {
            items: 3,
            dots: false
        }
    }
});
    });

</script>
@endsection
