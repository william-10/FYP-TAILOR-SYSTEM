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
                            <div class="border">{{$orders->fname}}</div>

                            <label for=""><strong>Last Name</strong></label>
                            <div class="border">{{$orders->lname}}</div>
                            <label for=""><strong>Email</strong></label>
                            <div class="border">{{$orders->email}}</div>

                            <label for=""><strong>Phone Number</strong></label>
                            <div class="border">{{$orders->phone}}</div>


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

                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>image</th>
                                <th>kifua</th>
                                <th>Bega</th>
                                <th>Mkono</th>
                                <th>Urefu wa juu</th>
                                <th>Kiuno</th>
                                <th>Paja</th>
                                <th>Urefu wa mguu</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders->orderitems as $item)

                                <tr>

                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" alt="Product image here" width="50px">
                                    </td>
                                    <td>{{$item->kifua}}</td>
                                    <td>{{$item->bega}}</td>
                                    <td>{{$item->mkono}}</td>
                                    <td>{{$item->urefu_juu}}</td>
                                    <td>{{$item->kiuno}}</td>
                                    <td>{{$item->paja}}</td>
                                    <td>{{$item->urefu_mguu}}</td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <h4 class="px-2">GRAND TOTAL : TZS.<span class="float-end">{{$orders->total_price}}</h4></span>

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
