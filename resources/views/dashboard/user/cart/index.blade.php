@extends('dashboard.user.inc.front')

@section('title')
CART
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top ">
    <div class="container">
        <h5 class="mb-0">
            <a href="{{URL('/user/home')}}">HOME</a> /
                <a href="{{url('/user/cart')}}">Cart</a></h5>
            </div>
</div>
    <div class="container my-5">
        @if (count($cartitems)> 0)
        @php $total=0; @endphp

    @foreach ($cartitems as $item)
        <div class="card shadow">
            <div class="card-body">

                <div class="row product_data">
                    <div class="col-md-2 mt-2">
                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" alt="product image" height="70px" width="70px">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h4>{{$item->products->name}}</h4>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h4>TZS.{{$item->products->selling_price}}</h4>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">

                        @if ($item->products->qty > $item->prod_qty)
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-right mb-3" style="width:100px">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>

                            @php $total+=$item->products->selling_price * $item->prod_qty; @endphp
                        @else
                            <h5>Out of stock</h5>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash">Remove</i></button>
                    </div>
                </div>
                </div>
                </div>
                @endforeach
                    <div class="card">
                        <div class="card-footer">
                            <h6>Total Price:TZS.{{$total}}
                            <a href="{{url('/user/checkout')}}" class="btn btn-outline-success float-end ">Proceed to checkout</a>
                            </h6>
                        </div>
                        </div>
                @else
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h2>Your <i class="fa fa-shopping-cart"></i> cart is empty</h2>
                        <a href="{{url('/user/home')}}" class="btn btn-outline-primary float-end">
                            Continue Shopping
                        </a>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
@endsection
