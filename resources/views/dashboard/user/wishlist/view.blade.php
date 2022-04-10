@extends('dashboard.user.inc.front')

@section('title',$products->name)


@section('content')

<div id="mymodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">Body</div>
        </div>
    </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top ">
    <div class="container">
        <h5 class="mb-0">Collections/{{$products->categories->category_name}}/{{$products->name}}</h5>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/product/'.$products->image)}}" class="w-100" alt="product image">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending =='1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original price :TZS.<s>{{$products->original_price}}</s></label>
                    <label class="fw-bold">selling price :TZS.{{$products->selling_price}}</TZS.></label>
                    <p class="mt-3">
                        {{ $products->description }}
                    </p>
                    <hr>
                    @if ($products->qty >0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-sd-2">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" style="width:30px"
                                    class="form control qty-input text-center" />
                                <button class="input-group-text increment-btn">+</button>
                            </div>

                            <div class="row">

                                <div class="col-md-2 mb-3">
                                    <label for="">bega</label>
                                    <input type="number" class="form-control bega-input" autocomplete="off" value="0"
                                        name="bega">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="">mkono</label>
                                    <input type="number" class="form-control mkono-input" autocomplete="off" value="0"
                                        name="mkono">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="">kifua</label>
                                    <input type="number" class="form-control kifua-input" autocomplete="off" value="0"
                                        name="kifua">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="">urefu</label>
                                    <input type="number" class="form-control urefujuu-input" autocomplete="off"
                                        value="0" name="urefu_juu">
                                </div>




                                <div class="col-md-2 mb-3">
                                    <label for="">kiuno</label>
                                    <input type="number" class="form-control kiuno-input" autocomplete="off" value="0"
                                        name="kiuno">
                                </div>



                                <div class="col-md-2 mb-3">
                                    <label for="">paja</label>
                                    <input type="number" class="form-control paja-input" autocomplete="off" value="0"
                                        name="paja">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="">urefu mguu</label>
                                    <input type="number" class="form-control urefumguu-input" autocomplete="off"
                                        value="0" name="urefu_mguu">
                                </div>


                            </div>

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#mymodal">measurement help</button>



                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-10">
                            <br />

                            @if ($products->qty >0)
                            <button type="button" class="btn btn-primary me-3       addTo-wish-cartBtn float-end">
                                <i class="fal fa-shopping-cart">Add to cart</i>
                            </button>


                            @endif

                            @if ($products->qty >0)

                            @endif
                            <button type="button" class="btn btn-success me-3 addToWishlist float-end">Add to
                                wishlist</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
