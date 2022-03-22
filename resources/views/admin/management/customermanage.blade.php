@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4>CUSTOMER MANAGEMENT</h4>
    <hr>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                
                    <th><h5> NAME</h5></th>
                    <th><h5>EMAIL</h5></th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>

                    
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection