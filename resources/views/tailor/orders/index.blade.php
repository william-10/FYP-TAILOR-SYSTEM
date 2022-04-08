@extends('tailor.layouts.tailor')

@section('title')
ORDERS
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header bg-primary">
                    ORDERS
                </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                <thead>
                    <tr>

                    <th>Order Date</th>
                    <th>Tracking Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($order as $item)

                    <tr>

                        <td>{{date('d-m-Y',strtotime ($item->orders->created_at))}}</td>
                        <td>{{$item->orders->tracking_no}}</td>
                        <td>{{$item->orders->total_price}}</td>
                        <td>{{$item->orders->status == '0' ? 'pending':'completed'}}</td>
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
