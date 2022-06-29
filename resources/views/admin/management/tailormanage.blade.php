@extends('admin.layouts.admin')

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="{{url('/admin/register-tailor')}}" method="POST">
                <!--form tag for the modal   -->

                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="tailor_name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <input id="tailor_name" type="text" placeholder="Enter full name"
                                class="form-control @error('tailor_name') is-invalid @enderror" name="tailor_name">
                            <span class="text-danger">@error('tailor_name'){{ $message}}@enderror</span>
                        </div>
                    </div>





                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" placeholder="Enter email address"
                                class="form-control @error('email') is-invalid @enderror" name="email">
                            <span class="text-danger">@error('email'){{ $message}}@enderror</span>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">Phone number</label>

                        <div class="col-md-6">
                            <input id="phone" type="name" placeholder="Enter phone number"
                                class="form-control @error('phone') is-invalid @enderror" name="phone">
                            <span class="text-danger">@error('phone'){{ $message}}@enderror</span>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            <span class="text-danger">@error('password'){{ $message}}@enderror</span>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col">
    </div>
    <div class="card-header">
        <h4> TAILOR MANAGEMENT</h4>

    </div>

    <div class="col">
        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
            data-bs-target="#exampleModal">ADD</button>
            <a href="{{ url('admin/pdf') }}" class="btn btn-outline-success float-start">Download pdf</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-responsive">
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
                    <h5>DATE JOINED</h5>
                </th>
                <th>
                    <h5>LOCATION</h5>
                </th>
                <th>
                    <h5>STATUS</h5>
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
                <td>{{$item->created_at->format('d/m/Y')}}</td>
                <td>{{ $item->city }}</td>
                @if( $item->status=="1" )
                <td><strong class="badge badge-success rounded pill"><i class="fa fa-check"></i></strong></td>
                @elseif( $item->status=="0")
                <td><strong class="badge badge-danger"><i class="fa fa-window-close"></i></strong></td>
                @endif

                <td>
                    <form action="{{ url('admin/update-status')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $item->tailor_id }}" name="tailor_id">
                     <button type="submit"class="btn btn-primary "
                        onclick="return confirm('are you sure you want to change status of the registerd tailor?')">Status</button>
                    </form>

                    <!-- <a href="{{ url('admin/delete-tailor/'.$item->tailor_id)}}" class="btn btn-danger"
                        onclick="return confirm('are you sure you want to delete the registerd tailor?')"><i class="fa fa-trash"></i></a> -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tailor->links() !!}
</div>


<style>
.pagination {
    float: right;
    margin-top: 20px;
}
</style>


@endsection
