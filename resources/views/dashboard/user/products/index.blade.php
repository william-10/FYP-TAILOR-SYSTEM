@extends('dashboard.user.inc.front')

@section('title')
Products
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3" >
                        <a href="{{url('/user/view-product/'.$product->categories->slug.'/'.$product->slug)}}">
                        <div class="card">
                            <img src="{{asset('assets/uploads/product/'.$product->image)}}"  alt="image here"class="card-img-top" >
                            <div class="card-body">
                                <h5>{{$product->name}}</h5>
                                <h6>Tailor: {{$product->tailors->tailor_name}}</h6>
                                <span class="float-start">{{$product->selling_price}}</span>
                                        <span class="float-end"><s>{{ $product->original_price }}</s></span>
                            </div>
                        </div>
                        </a>
                    </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
