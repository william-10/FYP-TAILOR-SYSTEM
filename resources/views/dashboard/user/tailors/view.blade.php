@extends('dashboard.user.inc.front')

@section('title', $unique_tailor->tailor_name)


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Profile</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset(''.$unique_tailor->avator)}}" class="w-100 img-fluid" alt="image here">
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
            <div class="col-md-12 mt-4">
                <h4>LOCATION</h4>
                <p style="color:blue">
                    {{  $unique_tailor->address }}
                </p>
            </div>
            <div class="col-md-12">
                <a href="{{url('/user/gallery/'.$unique_tailor->tailor_id)}}">
                    <button class="btn btn-primary">GALLERY</button>
                </a>

            </div>

            <div class="col-md-12">
                <!-- <a href="{{url('/user/product/'.$unique_tailor->tailor_id)}}"><h4>PRODUCTS</h4></a> -->

            </div>


        </div>
    </div>



</div>

<div class="container">
    <h4 class="py-2  ">PRODUCTS</h4>
    @if (count($tailor_product)>0)


    <div class="card shadow">

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    @foreach ($tailor_product as $product)
                    <div class="col-md-4 mb-3 ">
                        <a href="#">

                            <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="w-100 img-fluid"
                                alt="image here">
                            <div class="card-body">
                                <h5>{{$product->name}}</h5>
                                <h6>Tailor: {{$product->tailors->tailor_name}}</h6>
                                <span class="float-start">{{$product->selling_price}}</span>
                                <span class="float-end"><s>{{ $product->original_price }}</s></span>
                            </div>

                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
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
</div>

</div>


</div>

</div>
</div>
@endsection

@section('scripts')
<script>
$('.owl-carousel').owlCarousel({
    loop: true;
    margin: 10;
    dots: false,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }

    }
})
</script>
@endsection
