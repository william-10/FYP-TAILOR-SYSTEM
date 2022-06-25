@extends('tailor.layouts.tailor')

@section('title')
CATEGORIES
@endsection

@section('content')
@if ( Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')  }}
                                </div>
                            @endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header bg-primary">
                        <h4 class="text-white">CATEGORIES

                        </h4>
                </div>
                        <div class="card-body">

                        <table class="table table-bordered">
                <thead>
                    <tr>

                    <th>ID</th>
                    <th>CATEGORY</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($viewcategory as $item)
                    <tr>
                            <td>{{$loop->index+1}}</td>
                         <td>{{$item->sewcategory->category_name}}</td>

                        <td>
                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                        </td>


                    </tr>
                    @endforeach
                </tbody>

            </table>
                            </div>
        </div>

        </div>
    </div>
</div>


@endsection
