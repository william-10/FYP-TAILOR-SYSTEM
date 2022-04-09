@extends('dashboard.user.inc.front')

@section('title')
Wishlist
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top ">
    <div class="container">
        <h5 class="mb-0">
            <a href="{{URL('/user/home')}}">HOME</a> /
            <a>Wishlist</a>
        </h5>
    </div>
</div>

<div class="container my-5">
    @if ($wishlist->count() >0)


    @foreach ($wishlist as $item )
    <div class="card shadow">
        <div class="card-body">
            <div class="row product_data">
                <div class="col-md-2 mt-2">
                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" alt="product image"
                        height="70px" width="70px">
                </div>
                <div class="col-md-2 my-auto">
                    <h4>{{$item->products->name}}</h4>
                </div>
                <div class="col-md-2 my-auto">
                    <h4>TZS.{{$item->products->selling_price}}</h4>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">

                    @if ($item->products->qty > $item->prod_qty)

                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-right mb-3" style="width:100px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                    value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                    @else
                    <h5>Out of stock</h5>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <a href="{{url('/user/view-product/'.$item->products->slug)}}" class="btn btn-success"><i class="">Go to product</i></a>
                </div>

                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-btn"><i class="fa fa-trash">Remove</i></button>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    @else
    <div class="card shadow">
        <div class="card-body text-center">
            <h2>There are no Products in your Wishlist</h2>

        </div>
    </div>

    @endif

</div>


@endsection
