@extends('admin.layouts.admin')

@section('content')


    <div class="card-header">
    <h4> GENDER</h4>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>

                    <th><h5> NAME</h5></th>
                    <th><h5> IMAGE</h5></th>


                    <th><h5>ACTION</h5></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($gender as $item )


                    <tr>


                        <td>{{ $item->name }}</td>
                        <td> <img src="{{asset('assets/uploads/gender/'.$item->image)}} " class="cate-image"  alt="image here" ></td>




                        <td>
                            <a href="{{ url('admin/edit-gender/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/delete-gender/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete the gender type ?')" >  Delete</a>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>


@endsection
