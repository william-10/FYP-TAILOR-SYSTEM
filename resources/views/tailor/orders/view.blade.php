@extends('tailor.layouts.tailor')

@section('title')
VIEW ORDERS
@endsection

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View
                        <a href="{{url('/tailor/orders')}}" class="btn btn-warning float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

            <div class="row">
                        <div class="col-md-12 order-details">
                            <h4>PERSONAL DETAILS</h4>
                            <hr>

                            <label for=""><strong> First Name</strong></label>
                            <div class="border">{{$orders->users->name}}</div>

                            <label for=""><strong>Last Name</strong></label>
                            <div class="border">{{$orders->users->lname}}</div>
                            <label for=""><strong>Email</strong></label>
                            <div class="border">{{$orders->users->email}}</div>

                            <label for=""><strong>Phone Number</strong></label>
                            <div class="border">{{$orders->users->phone}}</div>


                        </div>
                        </div>
                        </div>
                        </div>
                            </div>
                            </div>



                        <div class="row mt-4">
                            <div class="card">
                                <div class="card-body order-details">
                   <div class="col-md-12">
                   <h4>ORDER DETAILS</h4>
                    <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Description</th>
                                <th>price</th>


                            </tr>
                            </thead>

                            <tbody>


                                <tr>
                                <td>{{$orders->description}}</td>
                                <td>{{$orders->price}}</td>

                                </tr>

                            </tbody>

                        </table>
                        <!-- <h4 class="px-2">GRAND TOTAL : TZS.<span class="float-end">{{$orders->total_price}}</h4></span> -->

                        <div class="mt-5" style="width:200px">
                        <label for="">Order Status</label>
                        <form action="{{url('/tailor/update-order/'.$orders->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                        <select class="form-select" name="order_status" aria-label="Default select example">

                            <option  {{ $orders->status == '0' ? 'selected': '' }} value="0">Pending</option>
                            <option {{ $orders->status == '1' ? 'selected': '' }}  value="1">Completed</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-3  float-end">Update</button>
                        </form>
                        </div>

                    </div>
                    </div>




                </div>
            </div>

        </div>
        </div>




@endsection
