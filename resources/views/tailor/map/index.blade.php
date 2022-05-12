@extends('tailor.layouts.tailor')

@section('title')
MAP
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4> MAP LOCATION</h4>

    </div>

    <div class="card-body">

    <div class="form-group">
            @csrf
<div class="row">
            <label for="address_address">Address</label>
    <input type="text" id="address-input" name="address_address" class="form-control map-input">
    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
</div>
<div id="address-map-container" style="width:100%;height:400px; ">
    <div style="width: 100%; height: 100%" id="address-map"></div>

    </div>


    <div class="col-md-4">
                     <button type="submit" class="btn btn-primary">Submit</button>
             </div>


</div>
</div>
</div>
@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

<script src="{{ asset('admin/js/mapiinput.js') }}" ></script>
@endsection
