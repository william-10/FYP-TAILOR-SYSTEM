@extends('dashboard.user.inc.front')

@section('title')


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">

    <h6 class="mb-0">GALLERY</h6>

</div>


    @if (count($unique_tailor)>0)


    <div class="card shadow">

        <div class="row">
            <div class="col-md-12">
                    @foreach ($unique_tailor as $gallery)
                    <div class="col-md-4 mb-3 ">
                        <a href="#">

                            <img src="{{asset('assets/uploads/gallery/'.$gallery->image)}}" class="w-100 img-fluid"
                                alt="image here">
                        </a>
                    </div>

                    @endforeach

            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="card shadow">
                <h5>no gallery pictures yet</h5>
            </div>
        </div>
    </div>

    @endif
</div>
@endsection
