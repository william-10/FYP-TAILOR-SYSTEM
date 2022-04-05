@extends('admin.layouts.admin')

@section('content')


<div class="card-header">
    <h4> TAILOR MANAGEMENT</h4>

</div>

<div class="table-responsive">
    <table class="table table-hover table-respnsive">
        <thead class="table-dark">
            <tr>
            <th>
                    <h5>ID</h5>
                </th>
                <th>
                    <h5>TAILOR NAME</h5>
                </th>
                <th>
                    <h5>EMAIL</h5>
                </th>
                <th>
                    <h5>PHONE NUMBER</h5>
                </th>
                <th>
                    <h5>LOCATION</h5>
                </th>

                <th>
                    <h5>ACTION</h5>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tailor as $item)
            <tr>

            <td>{{$loop->index+1}}</td>
                <td>{{ $item->tailor_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->location }}</td>
                <td>

                    <a href="{{ url('admin/delete-tailor/'.$item->tailor_id)}}" class="btn btn-danger"
                        onclick="return confirm('are you sure you want to delete the registerd tailor?')">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tailor->links() !!}
</div>


<style>
    .pagination{
        float:right;
        margin-top:20px;
    }
</style>


@endsection
