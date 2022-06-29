@extends('tailor.layouts.tailor')

@section('title')
MEASUREMENT
@endsection

@section('content')
@if ( Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')  }}
                                </div>
                            @endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header bg-primary">
                        <h4 class="text-white">MEASUREMENT
                           <!-- <a href="{{url('/tailor/order-history')}}" class="btn btn-warning float-end">Order History</a> -->
                        </h4>
                </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                <thead>
                    <tr>

                    <th>Order Date</th>
                    <th>Customer name</th>
                    <th>phone</th>
                    <th>Details</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($measurement as $item)
                
                    <tr>

                        <td>{{date('d-m-Y',strtotime ($item->created_at))}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->details}}</td>
                        <td>
                        <a href="{{ url('tailor/delete-measurement_detail/'.$item->id)}}" class="btn btn-danger"
                        onclick="return confirm('are you sure you want to delete the measurement details?')"><i class="fa fa-trash"></i></a>
                        
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
