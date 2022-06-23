@extends('admin.layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4> Edit/Update Category</h4>
    </div>

    <div class="card-body">
           <form action="{{ url('admin/update-cat/'.$category->category_id ) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')

             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" value="{{ $category->category_name }}" class="form-control" name="category_name">
                 </div>



                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>

           </form>
    </div>
</div>

@endsection
