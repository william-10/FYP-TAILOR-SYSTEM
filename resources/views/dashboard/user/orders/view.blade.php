@extends('dashboard.user.inc.front')

@section('title')
ORDERS
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View
                        <a href="{{url('/user/order-history')}}" class="btn btn-warning float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

            <div class="row">
                        <div class="col-md-10">
                            <h4>PERSONAL DETAILS</h4>
                            <hr>

                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->users->name}}</div>

                            <label for="">Last Name</label>
                            <div class="border p-2">{{$orders->users->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->users->email}}</div>

                            <label for="">Phone Number</label>
                            <div class="border p-2">{{$orders->users->phone}}</div>



                        </div>
                        </div>

                        <div class="row mt-3">
                <div class="col-md-10">
                    <h4>ORDER DETAILS</h4>
                    <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Tailor Name</th>
                                <th>Description</th>
                                <th>Price</th>

                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                <td > <a href="{{url('user/view-tailor/'.$orders->tailors->tailor_id)}}">{{$orders->tailors->tailor_name}}</a></td>
                                    <td>{{$orders->description}}</td>
                                    <td>{{$orders->price}}</td>

                                </tr>

                            </tbody>

                        </table>
                        <!-- <h4 class="px-2">GRAND TOTAL : TZS.<span class="float-end">{{$orders->total_price}}</h4></span> -->

                    </div>
                    </div>




                </div>
            </div>

        </div>
    </div>
</div>

@endsection
