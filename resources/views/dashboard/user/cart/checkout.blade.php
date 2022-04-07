@extends('dashboard.user.inc.front')

@section('title')


@section('content')
    <div class="container">
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
    </div>

@endsection
