@extends('tailor.layouts.tailor')

@section('title')
TAILOR STATISTICS
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">

        <div class="row">
        <div class="col-md-3">
            <div class="square-service-block">
               <a href="#">
                 <div class="ssb-icon"><i class="far fa-user-request" aria-hidden="true"></i></div>
                 <h1 class="ssb-title" style="color:white">ORDERS</h1>
                 <h2 class="ssb-title">{{ $order->count() }}</h2>             </a>
            </div>
          </div>

          <div class="col-md-3">
            <div class="square-service-block">
               <a href="#">
                 <div class="ssb-icon"> <i class="far fa-paper-plane" aria-hidden="true"></i> </div>
                 <h2 class="ssb-title" style="color:white">REQUEST</h2>
                 <h2 class="ssb-title">{{ $notification->count() }}</h2>
               </a>
            </div>
          </div>

          @php
                        $ratenum=number_format($rating_value)
                        @endphp
                        <!-- <div class="rating float-end">
                            @for ($i=1; $i<= $ratenum; $i++) <i class="fa fa-star checked"></i>
                                @endfor
                                @for ($j=$ratenum+1; $j<=5; $j++) <i class="fa fa-star"></i>
                                    @endfor

                                   


                        </div> -->
          <div class="col-md-3">
            <div class="square-service-block">
               <a href="#">
                 <div class="ssb-icon"> <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                 <h1 class="ssb-title" style="color:white">RATINGS</h1>
                 <span>
                                        @if ($ratings->count() > 0)
                                        
                                        <h2 class="ssb-title">{{$ratings->count()}} </h2>
                                        @else
                                        <h2 class="ssb-title">0</h2>
                                        @endif
                                    </span>
               </a>
            </div>
          </div>

        </div>
        </div>
    </div>

</div>

@endsection
