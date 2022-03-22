@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> TAILOR MANAGEMENT</h4>
    <hr>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                
                    <th><h5>TAILOR NAME</h5></th>
                    <th><h5>EMAIL</h5></th>
                    <th><h5>PHONE NUMBER</h5></th>
                    <th><h5>LOCATION</h5></th>
                    
                    <th><h5>ACTION</h5></th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($tailor as $item)
                    <tr>

                    
                        <td>{{ $item->tailor_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                           
                            <a href="{{ url('admin/delete-tailor/'.$item->tailor_id)}}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection