@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> Edit Measurement</h4>
    </div>

    <div class="card-body">
           <form action="{{ url('admin/update-measurement/'.$measurement->id ) }}" method="POST" enctype="multipart/form-data">

               @csrf
               @method('PUT')
             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name" value="{{ $measurement->name }}">
                 </div>


                 <div class="col-md-6 mb-3">
                 <label for="details">DETAILS</label>
                     <textarea id="details" class="form-control" rows="3" name="details" value="{{ $measurement->details }}"> </textarea>
                 </div>
                 @if($measurement->image1)
                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image1">
                 </div>
                 @endif
                 @if ($measurement->image2)


                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image2">
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
