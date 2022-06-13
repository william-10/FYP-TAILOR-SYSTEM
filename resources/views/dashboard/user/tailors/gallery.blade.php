@extends('dashboard.user.inc.front')

@section('title')


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">

    <h6 class="mb-0">GALLERY</h6>

</div>


@if (count($unique_tailor)>0)

    <div class="row">

            @foreach ($unique_tailor as $gallery)
            <!-- <div class="col-md-4 mb-3 ">
                        <a href="#">

                            <img src="{{asset('assets/uploads/gallery/'.$gallery->image)}}" class="w-100 img-fluid"
                                alt="image here">
                        </a>
                    </div> -->


                <div class="item col-lg-3 col-md-4 col-6 col-sm py-3">
                <div class="portfolio-item row">
                    <a href="{{asset('assets/uploads/gallery/'.$gallery->image)}}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid"
                            src="{{asset('assets/uploads/gallery/'.$gallery->image)}}"
                            alt="">
                    </a>
                </div>
                </div>
                @endforeach


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

@endsection

@section('scripts')
<script>
     $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');

         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
</script>
@endsection
