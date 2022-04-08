@extends('dashboard.user.inc.front')

@section('title')


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top ">
    <div class="container">
        <h5 class="mb-0">
            <a href="{{URL('/user/home')}}">HOME</a> /
                <a href="{{url('/user/cart')}}">Cart</a>/Checkout</h5>

            </div>
</div>

<div class="container">
    <form action="{{url('/user/place-order')}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-9 mt-4">
            <div class="card">
                <div class="card-body">
                    <h6>BASIC DETAILS</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">

                                <label for="">First name</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->name}}" name="fname" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6 ">
                            <label for="">Last name</label>
                                <input type="text" value="{{Auth::user()->lname}}" class="form-control" name="lname" placeholder="Enter Last name">
                            </div>
                            <div class="col-md-6 mt-3">
                            <label for="">Phone number</label>
                                <input type="number" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter phone number">
                            </div>

                            <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                                <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter email address">
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>



        <div class="row">
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div class="card-body shadow">
                        <h6>Order Details</h6>
                            <hr>
                                    <table class="table table-striped">

                                    <thead class="table table-dark">

                                                <th>NAME</th>
                                                <th>TAILOR</th>
                                                <th>QTY</th>
                                                <th>PRICE</th>



                                                <th>MKONO</th>
                                                <th>BEGA</th>
                                                <th>KIFUA</th>
                                                <th>UREFU JUU</th>




                                                <th>KIUNO</th>
                                                <th>PAJA</th>
                                                <th>UREFU MGUU</th>





                                        </thead>

                                        <tbody class=" table table-striped">
                                        @foreach ($cartitems as $item )
                                            <tr>
                                                <td>{{$item->products->name}}</td>
                                                <td>{{$item->products->tailors->tailor_name}}</td>
                                                <td>{{$item->prod_qty}}</td>
                                                <td>{{$item->products->selling_price}}</td>



                                                <td>{{$item->mkono}}</td>
                                                <td>{{$item->bega}}</td>
                                                <td>{{$item->kifua}}</td>
                                                <td>{{$item->urefu_juu}}</td>



                                                <td>{{$item->kiuno}}</td>
                                                <td>{{$item->paja}}</td>
                                                <td>{{$item->urefu_mguu}}</td>



                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                <button class="btn btn-primary float-end">Place Order</button>

                    </div>
                </div>
            </div>
        </div>
        </form>
        </div>

@endsection
