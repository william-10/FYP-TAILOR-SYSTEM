@extends('dashboard.user.inc.front')

@section('title')
Customer homepage
@endsection

@section('content')
<div class="container">
<div class="row">


                @foreach ($tailor as $tailor)
                    <div class="col-md-4 mb-3 my-5" >
                        <a href="{{url('user/view-tailor/'.$tailor->tailor_id)}}">
                        <div class="card ">
                            <div class="flex-fill d-flex align-items-center">

                            <img src="{{asset(''.$tailor->avator)}}" class="card-img-top " width="100%" height="100%" alt="image here">
                            </div>
                            <div class="card-body">
                                <h5>{{$tailor->tailor_name}}</h5>
                                <span class="float-start">{{$tailor->location}}</span>
                            </div>
                        </div>
                        </a>
                    </div>

                @endforeach


        </div>
    </div>

@endsection
