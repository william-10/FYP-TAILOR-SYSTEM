@extends('dashboard.user.inc.front')

@section('title', $unique_tailor->tailor_name)


@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="{{url('/user/add-rating')}}" method="POST">
                <!--form tag for the modal   -->

                @csrf
                <input type="hidden" value="{{ $unique_tailor->tailor_id }}" name="tailor_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{  $unique_tailor->tailor_name }} </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">

                            @if ($user_rating)
                            @for ($i=1; $i<= $user_rating->stars_rated; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>

                                @endfor
                                @for ($j=$user_rating->stars_rated+1; $j<=5; $j++) <input type="radio" value="{{$j}}"
                                    name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>

                                    @endfor

                                    @else

                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>

                                    @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Profile</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="bg-image hover-zoom">
                        <img src="{{asset(''.$unique_tailor->avator)}}" class="w-100 img-fluid" alt="image here">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-mb-0">
                        <h2> {{ $unique_tailor->tailor_name }}</h2>
                    </div>
                    <hr>
                    <div class="mb-0">
                        <h6>{{$unique_tailor->phone}}</h6>
                    </div>
                    <hr>

                    <p class="mt-3">
                        {{ $unique_tailor->location }}
                    </p>



                </div>
            </div>
            @php
            $ratenum=number_format($rating_value)
            @endphp
            <div class="rating">
                @for ($i=1; $i<= $ratenum; $i++) <i class="fa fa-star checked"></i>
                    @endfor
                    @for ($j=$ratenum+1; $j<=5; $j++) <i class="fa fa-star"></i>
                        @endfor

                        <span>
                            @if ($ratings->count() > 0)
                            {{$ratings->count()}} Ratings

                            @else
                            No ratings
                            @endif
                        </span>
            </div>

            <div class="col-md-12 mt-4">
                <h4>LOCATION</h4>
                <p style="color:blue">
                    {{  $unique_tailor->address }}
                </p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Rate
                    this tailor</button>

            </div>
            <div class="col-md-12">
                <a href="{{url('/user/gallery/'.$unique_tailor->tailor_id)}}">
                    <h4>GALLERY</h4>
                </a>

            </div>

            <div class="col-md-12">
                <!-- <a href="{{url('/user/product/'.$unique_tailor->tailor_id)}}"><h4>PRODUCTS</h4></a> -->

            </div>


        </div>
    </div>



</div>



@if (count($tailor_product)>2)
<div class="container">
    <h4 class="py-2  ">PRODUCTS</h4>
    <div class="owl-carousel owl-theme">
        <div class="ms-2 me-2">


            @foreach ($tailor_product as $product)

            <div class="card">

                <a href="{{url('/user/view-product/'.$product->categories->slug.'/'.$product->slug)}}">

                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" width="100%"
                        height="100%" alt="image here">
                    <div class="card-body">
                        <h5>{{$product->name}}</h5>

                        <span class="float-start">{{$product->selling_price}}</span>
                        <span class="float-end "><s>{{ $product->original_price }}</s></span>
                    </div>
            </div>



        </div>
        @endforeach
    </div>
</div>

@elseif (count($tailor_product)>0)
<div class="container">
    <h4 class="py-2  ">PRODUCTS</h4>
    <div class="row">

        @foreach ($tailor_product as $product)
        <div class="col-md-4 mb-3">
            <a href="{{url('/user/view-product/'.$product->categories->slug.'/'.$product->slug)}}">
                <div class="card">

                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="card-img-top" width="100%"
                        height="100%" alt="image here">

                    <div class="card-body">
                        <h5>{{$product->name}}</h5>

                        <span class="float-start">{{$product->selling_price}}</span>
                        <span class="float-end "><s>{{ $product->original_price }}</s></span>
                    </div>
                </div>
            </a>


        </div>

        @endforeach
    </div>
</div>



@else
<div class="container">
    <div class="row">
        <div class="card shadow">
            <h5>no products yet</h5>
        </div>
    </div>
</div>

@endif




@endsection
