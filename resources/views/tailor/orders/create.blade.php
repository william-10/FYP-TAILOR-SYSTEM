@extends('tailor.layouts.tailor')

@section('title')
CREATE ORDER
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

        <div class="card">
                <div class="card-header">
                <h4>CREATE ORDER</h4>

                </div>

                      <div class="card-body">

                      <form action="{{url('tailor/add-order')}}" method="POST" enctype="multipart/form-data">
                      @if ( Session::get('message'))
                                <div class="alert alert-success alert-dismissable">
                                    {{Session::get('success')  }}
                                </div>
                            @endif

                            @if ( Session::get('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')  }}
                                </div>
                            @endif
               @csrf

             <div class="row">
                 <input type="hidden" name="tailor_id" value="{{Auth::user()->tailor_id}}">

                 <div class="col-md-6 mb-3">
                     <label for="">EMAIL</label>
                     <input type="text" class="form-control" name="customer_email" value="{{ old('customer_email')}}">
                     <span class="text-danger">@error('customer_email'){{ $message}}@enderror</span>
                 </div>

                 <!-- <div class="col-md-6 mb-3">
                     <label for="">Phone</label>
                     <input type="text" class="form-control" name="slug">
                 </div> -->

                 </div>




                <div class="col-md-12 mb-3">
                     <label for="">Description</label>
                     <textarea class="form-control" rows="3" name="description" value="{{ old('description')}}"></textarea>
                     <span class="text-danger">@error('description'){{ $message}}@enderror</span>
                 </div>

                 <div class="col-md-12 mb-3">
                     <label for="">Measurement description</label>
                     <textarea class="form-control" rows="3" name="measurementdescription"></textarea>
                     <span class="text-danger">@error('measurementdescription'){{ $message}}@enderror</span>
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Total price</label>
                     <input type="number" class="form-control" name="price" value="{{ old('price')}}">
                     <span class="text-danger">@error('price'){{ $message}}@enderror</span>
                 </div>

                 <div class="col-md-4">
                     <button type="submit" class="btn btn-primary">Submit</button>
             </div>

           </form>

                     </div>
            </div>
        </div>
    </div>
</div>
@endsection
