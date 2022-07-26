@extends('tailor.layouts.tailor')

@section('title')
ORDERS
@endsection

@section('content')
@if ( Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')  }}
                                </div>
                            @endif
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <a href="{{url('tailor/pdf')}}" class="btn btn-outline-success float-start">Download pdf</a>
        </div>
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
                    <th>Customer email</th>
                    <th>tracking no</th>

                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>



                @foreach ($orderitem as $item)
                @if ($item->status == "0")
                    <tr>

                        <td>{{date('d-m-Y',strtotime ($item->created_at))}}</td>
                        <td>{{$item->users->email}}</td>

                        <td>{{$item->tracking_no}}</td>
                        <td ><strong class="badge badge-danger rounded pill"> Pending</strong></td>
                        <td>
                            <a href="{{url('/tailor/view-order/'.$item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                            <a href="{{ url('tailor/delete-order/'.$item->id)}}" class="btn btn-danger"
                        onclick="return confirm('are you sure you want to delete the order?')"><i class="fa fa-trash"></i></a>

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
