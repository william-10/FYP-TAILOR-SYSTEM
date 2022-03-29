@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> Add Gender</h4>
    </div>

    <div class="card-body">
           <form action="{{url('admin/insert-gender')}}" method="POST" enctype="multipart/form-data">

               @csrf
             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name">
                 </div>

                 </div>

                 <div class="row">
                 <div class="col-md-3 ">
                     <input type="file" class="form-control" name="image">
                 </div>
                 </div>



                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </div>


           </form>
    </div>
</div>

@endsection
