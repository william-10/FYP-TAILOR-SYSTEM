@extends('tailor.layouts.tailor')

@section('title')
MAP LOCATION
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>

                <th>
                    <h5>ID</h5>
                </th>
                <th>
                    <h5> LOCATION</h5>
                </th>
                <th>
                    <h5> LATITUDE</h5>
                </th>
                <th>
                    <h5> LONGITUDE</h5>
                </th>
                <th>
                    <h5> ACTION</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($map as $item )

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->latitude}}</td>
                <td>{{$item->longitude}}</td>
                <td>
                    <a href="{{url('tailor/view-map/'.$item->id)}}" class="btn btn-primary">View</a>

                    <a href="{{url('tailor/delete-map/'.$item->id)}}" class="btn btn-danger"
                        onclick="return confirm('are you sure you want to delete the product?')"> Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
</div>
</div>

@endsection
