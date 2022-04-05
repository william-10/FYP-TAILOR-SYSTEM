@extends('dashboard.user.inc.front')

@section('title')
tailor
@endsection

@section('content')


<div class="container">
                    <div class="row">
                        <!-- <div class="owl-carousel tailor-carousel owl-theme"> -->
                                        @foreach ($tailor_product as $tailor)
                                <div class="item">
                                    <div class="card">

                                        <h5>{{ $tailor->name }}</h5>
                                         <span class="float-start">{{$tailor->selling_price}}</span>
                                        <span class="float-end">{{ $tailor->original_price }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>


                    </div>


                <!--  -->
@endsection


@section('scripts')
<script>
    $('.tailor-carousel').owlCarousel({
        loop:true;
        margin:10;
        dots:false,
        nav:true,
        responsive:{
            0:{items:1},
            600:{items:3},
            1000:{items:4}

        }
    })
</script>
@endsection
