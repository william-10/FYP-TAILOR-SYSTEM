@extends('admin.layouts.admin')

@section('title')
GENERATE REPORT
@endsection

@section('content')
<div class="container">

        <div class="row">
        <div class="col-md-3">
            <div class="square-service-block">
               <a href="#">
                 <div class="ssb-icon"><i class="far fa-user" aria-hidden="true"></i></div>
                 <h1 class="ssb-title" style="color:white">Tailor</h1>
                 <h2 class="ssb-title">{{ $tailor->count() }}</h2>             </a>
            </div>
          </div>

          <div class="col-md-3">
            <div class="square-service-block">
               <a href="#">
                 <div class="ssb-icon"> <i class="far fa-user" aria-hidden="true"></i> </div>
                 <h1 class="ssb-title" style="color:white">Customer</h1>
                 <h2 class="ssb-title">{{ $customer->count() }}</h2>
               </a>
            </div>
          </div>
        </div>
</div>

@endsection
