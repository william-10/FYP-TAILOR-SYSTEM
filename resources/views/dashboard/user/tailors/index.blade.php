@extends('dashboard.user.inc.front')

@section('title')
Customer homepage
@endsection

@section('content')
<!-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">TAILORS</h6>
    </div>
</div> -->


<div class="container">
<div class="row">
                @foreach ($tailor as $tailor)
                    <div class="col-md-4 py-3 border-right" >
                        <a href="{{url('user/view-tailor/'.$tailor->tailor_id)}}">
                        <div class="card">
                            <div class="flex-fill d-flex align-items-center">

                            <img src="{{asset(''.$tailor->avator)}}" class="card-img-top " width="100%" height="90%" alt="image here">
                            </div>
                            <div class="card-body shadow">
                                <h5>{{$tailor->tailor_name}}</h5>
                                <strong class="float-start "  style="color:green">{{$tailor->region}}</strong>
                                <strong class="float-end" style="color:blue">{{$tailor->city}}</strong>
                            </div>

                        </div>
                        </a>
                    </div>

                @endforeach


        </div>
    </div>

@endsection

@section('scripts')

@if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif
@endsection
