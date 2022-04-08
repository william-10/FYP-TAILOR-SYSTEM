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
                        <a href="{{url('/user/my-orders')}}" class="btn btn-warning float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

            <div class="row">
                        <div class="col-md-10">
                            <h4>PERSONAL DETAILS</h4>
                            <hr>

                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>

                            <label for="">Last Name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>

                            <label for="">Phone Number</label>
                            <div class="border p-2">{{$orders->phone}}</div>

                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>

                        </div>
                        </div>

                        <div class="row mt-3">
                <div class="col-md-10">
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

                    </div>
                    </div>




                </div>
            </div>

        </div>
    </div>
</div>

@endsection
