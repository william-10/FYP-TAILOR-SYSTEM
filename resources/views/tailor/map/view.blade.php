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
                <div class="row">

                    <label for="address_address">Address</label>


                    <div class="col md-4 ">
                        <input type="text" id="address-input" class="form-control map-input" name="address" >

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
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>


    </div>
</div>

@endsection


@section('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
    async defer></script>

<script src="{{ asset('admin/js/mapiinput.js') }}"></script>
@endsection
