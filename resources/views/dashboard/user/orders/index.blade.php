@extends('dashboard.user.inc.front')

@section('title')
ORDERS
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    My Orders
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>

                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Tracking Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $item)

                    <tr>

                        <td>{{$loop->index+1}}</td>
                        <td>{{date('d-m-Y',strtotime ($item->created_at))}}</td>
                        <td>{{$item->tracking_no}}</td>
                        <td>{{$item->total_price}}</td>
                        @if ($item->status == '0')
                                 <td ><strong style="color:red">pending</strong></td>
                        @else($item->status == '1')
                            <td ><strong style="color:green">completed</strong></td>
                        @endif

                        <td>
                            <a href="{{url('/user/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
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
