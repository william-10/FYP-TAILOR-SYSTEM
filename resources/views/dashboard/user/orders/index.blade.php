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
                    <h4 class="text-black"> My Orders
                        <a href="{{url('/user/order-history')}}" class="btn btn-warning float-end">HISTORY</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>


                                <th>Order Date</th>
                                <th>Tailor Name</th>
                                <th>Tracking Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $item)
                            @if ($item->status == "0")
                            <tr>


                                <td>{{date('d-m-Y',strtotime ($item->created_at))}}</td>
                                <td> <a
                                        href="{{url('user/view-tailor/'.$item->tailors->tailor_id)}}">{{$item->tailors->tailor_name}}</a>
                                </td>
                                <td>{{$item->tracking_no}}</td>
                                <td><strong style="color:red">Pending</strong></td>


                                <td>
                                    <a href="{{url('/user/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
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
