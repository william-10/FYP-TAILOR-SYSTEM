@extends('admin.layouts.admin')

@section('content')


    <div class="card-header">
    <h4> MEASUREMENTS</h4>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>

                    <th><h5> NAME</h5></th>
                    <th><h5>FIRST IMAGE</h5></th>
                    <th><h5>SECOND IMAGE</h5></th>
                    <th><h5>DETAILS</h5></th>
                    <th><h5>ACTION</h5></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($measurement as $item )


                    <tr>


                        <td>{{ $item->name }}</td>
                        <td> <img src="{{asset('assets/uploads/measurement/image1/'.$item->image1)}} " class="cate-image"  alt="image here" ></td>

                        <td> <img src="{{asset('assets/uploads/measurement/image2/'.$item->image2)}} " class="cate-image"  alt="image2 here" ></td>

                        <td>{{ $item->details }}</td>
                        <td>
                            <a href="{{ url('admin/edit-measurement/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/delete-measurement/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete the measurement ?')" >  Delete</a>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>


@endsection
