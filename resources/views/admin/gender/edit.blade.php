@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> Edit Gender</h4>
    </div>

    <div class="card-body">
           <form action="{{ url('admin/update-gender/'.$gender->id ) }}" method="POST" enctype="multipart/form-data">

               @csrf
               @method('PUT')

             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name" value="{{ $gender->name }}">
                     </div>
                     </div>


                 @if($gender->image)
                 <div class="row">
                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image">
                 </div>
                 @endif

                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>

           </form>
    </div>
</div>

@endsection
