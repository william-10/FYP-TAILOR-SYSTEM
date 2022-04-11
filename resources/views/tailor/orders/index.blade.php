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
                        <h4 class="text-white">NEW ORDERS
                            <a href="{{url('/tailor/order-history')}}" class="btn btn-warning float-end">Order History</a>
                        </h4>
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



                @foreach ($orderitem as $item)
                @if ($item->orders->status == "0")
                    <tr>

                        <td>{{date('d-m-Y',strtotime ($item->orders->created_at))}}</td>
                        <td>{{$item->orders->tracking_no}}</td>
                        <td>{{$item->orders->total_price}}</td>
                        <td ><strong style="color:red">Pending</strong></td>



                        <td>
                            <a href="{{url('/tailor/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                        </td>
                    </tr>


                    @endif

                    @endforeach


                </tbody>

            </table>
                            </div>
        </div>

        </div>
    </div>
</div>


@endsection
