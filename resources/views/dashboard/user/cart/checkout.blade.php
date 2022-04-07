@extends('dashboard.user.inc.front')

@section('title')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="card">
                    <div class="card-body shadow">
                        <h6>Order Details</h6>
                            <hr>
                                    <table class="table table-striped">

                                    <thead class="table table-dark">

                                                <th>NAME</th>
                                                <th>QTY</th>
                                                <th>PRICE</th>

                                        </thead>

                                        <tbody class=" table table-striped">
                                        @foreach ($cartitems as $item )
                                            <tr>
                                                <td>{{$item->products->name}}</td>
                                                <td>{{$item->prod_qty}}</td>
                                                <td>{{$item->products->selling_price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                <button class="btn btn-primary float-end">Place Order</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
