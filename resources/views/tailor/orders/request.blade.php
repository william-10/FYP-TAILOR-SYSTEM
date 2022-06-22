@extends('tailor.layouts.tailor')

@section('title')
REQUESTS
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

        <div class="card">
                <div class="card-header">
                <h4>REQUESTS</h4>

                </div>

                <div class="card-body">



<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Customer Name</th>
<th>EMAIL</th>
<th>Request Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>



@foreach ($customer_request as $item)
<tr>
<td>{{$loop->index+1}}</td>
<td>{{$item->users->name}}</td>
<td>{{$item->users->email}}</td>
<td>{{date('d-m-Y',strtotime ($item->created_at))}}</td>
<td><strong class="badge badge-warning rounded pill">Requested</strong></td>
<td>
    <a href="" class="btn btn-primary">View</a>
</td>
</tr>

@endforeach


</tbody>

</table>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
