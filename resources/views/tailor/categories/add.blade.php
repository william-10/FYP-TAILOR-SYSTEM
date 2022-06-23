@extends('tailor.layouts.tailor')

@section('title')
CATEGORIES
@endsection

@section('content')

<div class="card">
    <div class="card-header">
    <h4> SEWING CATEGORIES</h4>
    <hr>
        <div class="card-body">
        <form action="{{url('tailor/post-categories')}}" method="POST">
                        @csrf
                        @method('POST')

<!--
                                <div class="col-md-6 mb-3">
                                <label for="category1">CATEGORY 1</label>
                                    <select class="form-select" name="category_name1">
                                        <option value=""></option>
                                        @foreach ($category as $item )
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div> -->

                                <!-- <div class="col-md-6 mb-3">
                                <label for="category2">CATEGORY 2</label>
                                    <select class="form-select" name="category_name2">
                                        <option value=""></option>
                                        @foreach ($category as $item )
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="category2">CATEGORY 3</label>
                                    <select class="form-select" name="category_name3">
                                        <option value=""></option>
                                        @foreach ($category as $item )
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div> -->

                                <div class="col-md-6 mb-3">
                                <label for="category4">CATEGORY 4</label>
                                    <select class="form-select" name="category_id">
                                        <option value=""></option>
                                        @foreach ($category as $item )
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>


                            <button type="submit" class="btn btn-primary float-start">Submit</button>


                    </form>
        </div>
    </div>
</div>
</div>

@endsection
