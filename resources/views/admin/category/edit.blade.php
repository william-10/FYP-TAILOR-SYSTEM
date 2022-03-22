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

                 <div class="col-md-6 mb-3">
                     <label for="">Slug</label>
                     <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                 </div>
                 
                 <div class="col-md-6 mb-3">
                     <label for="">Status</label>
                     <input type="checkbox" {{ $category->status== "1" ? 'checked':''}} name="status">
                 </div>
                 <div class="col-md-6 mb-3">
                     <label for="">Popular</label>
                     <input type="checkbox" {{ $category->popular== "1" ? 'checked':''}}  name="popular">
                 </div>
                 @if($category->image)
                <img src="{{asset('assets/uploads/category'.$category->image)}}" alt="category image" class="cate-image">
                 @endif
                 <div class="col-md-12">
                     <input type="file" class="form-control" name="image">
                 </div>   
               
                 
               

                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>

           </form>    
    </div>
</div>

@endsection 