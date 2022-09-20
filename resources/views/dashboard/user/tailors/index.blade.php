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
<style>
    .footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#282d32;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}
</style>

<div class="container">
<div class="row">
                @foreach ($tailor as $tailor)
                    <div class="col-md-4 py-3 border-right" >
                        <a href="{{url('user/view-tailor/'.$tailor->tailor_id)}}">
                        <div class="card">
                            <div class="flex-fill d-flex align-items-center">

                            <img src="{{asset('/storage/avator/'.$tailor->avator)}}" class="card-img-top " width="100%" height="90%" alt="image here">
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
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-3 item">
                        <h3>Contacts</h3>
                        <ul>
                            <li><i class="fa fa-phone">     0658334677</i></li>
                            <li><i class="fa fa-envelope">     willygeorge100@gmail.com</i></li>

                        </ul>
                    </div>

                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">OTMS © 2022</p>
            </div>
        </footer>

@endsection

@section('scripts')

@if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif
@endsection
