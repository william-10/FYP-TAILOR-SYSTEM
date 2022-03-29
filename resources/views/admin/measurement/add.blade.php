@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> Add Measurement</h4>
    </div>

    <div class="card-body">
           <form action="{{url('admin/insert-measurement')}}" method="POST" enctype="multipart/form-data">

               @csrf
             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name">
                 </div>


                 <div class="col-md-6 mb-3">
                 <label for="details">DETAILS</label>
                     <textarea id="details" class="form-control" rows="3" name="details"> </textarea>
                 </div>

                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image1">
                 </div>

                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image2">
                 </div>

                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </div>

           </form>
    </div>
</div>

@endsection
