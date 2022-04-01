@extends('dashboard.user.inc.front')

@section('title')
Customer homepage
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                @foreach ($tailor as $tailor)
                    <div class="col-md-4 mb-3">
                        <a href="{{url('user/view-tailor/'.$tailor->tailor_name)}}">
                        <div class="card">
                            <img src="{{asset(''.$tailor->avator)}}" class="w-100" alt="image here">
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
        </div>
    </div>
</div>
@endsection
