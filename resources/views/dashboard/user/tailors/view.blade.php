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
                    <img src="{{asset(''.$unique_tailor->avator)}}" class="w-100"alt="image here">
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
                    <h4>GALLERY</h4>

                </div>

        </div>
    </div>
</div>
@endsection
