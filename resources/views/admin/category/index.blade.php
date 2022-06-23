@extends('admin.layouts.admin')

@section('content')


    <div class="card-header">
    <h4> CATEGORY PAGE</h4>

    </div>



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                <th><h5> ID</h5></th>
                    <th><h5>CATEGORY NAME</h5></th>
                    <th><h5>ACTION</h5></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>

                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->category_name }}</td>


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
