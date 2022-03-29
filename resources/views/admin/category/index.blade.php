@extends('admin.layouts.admin')

@section('content')


    <div class="card-header">
    <h4> CATEGORY PAGE</h4>

    </div>



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>

                    <th><h5>CATEGORY NAME</h5></th>
                    <th><h5>IMAGE</h5></th>
                    <th><h5>ACTION</h5></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>


                        <td>{{ $item->category_name }}</td>
                        <td>
                        <img src="{{asset('assets/uploads/category/'.$item->image)}} " class="cate-image"  alt="image here" >
                        </td>

                        <td>
                            <a href="{{ url('admin/edit-cat/'.$item->category_id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/delete-cat/'.$item->category_id)}}" class="btn btn-danger" onclick="return confirm('are you sure ?')" >  Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
