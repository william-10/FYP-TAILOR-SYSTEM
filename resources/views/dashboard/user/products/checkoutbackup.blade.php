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
                                                <th>TAILOR</th>
                                                <th>QTY</th>
                                                <th>PRICE</th>

                                                @if ($cartitems->products->upper_part =='1')

                                                <th>MKONO</th>
                                                <th>BEGA</th>
                                                <th>KIFUA</th>
                                                <th>UREFU JUU</th>
                                                @endif

                                                @if ($cartitems->products->lower_part =='1')

                                                <th>KIUNO</th>
                                                <th>PAJA</th>
                                                <th>UREFU MGUU</th>

                                                @endif



                                        </thead>

                                        <tbody class=" table table-striped">
                                        @foreach ($cartitems as $item )
                                            <tr>
                                                <td>{{$item->products->name}}</td>
                                                <td>{{$item->products->tailors->tailor_name}}</td>
                                                <td>{{$item->prod_qty}}</td>
                                                <td>{{$item->products->selling_price}}</td>

                                                @if ($item->products->upper_part =='1')
                                                <td>{{$item->mkono}}</td>
                                                <td>{{$item->bega}}</td>
                                                <td>{{$item->kifua}}</td>
                                                <td>{{$item->urefu_juu}}</td>
                                                @endif

                                                @if ($item->products->lower_part =='1')
                                                <td>{{$item->kiuno}}</td>
                                                <td>{{$item->paja}}</td>
                                                <td>{{$item->urefu_mguu}}</td>

                                                @endif

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
