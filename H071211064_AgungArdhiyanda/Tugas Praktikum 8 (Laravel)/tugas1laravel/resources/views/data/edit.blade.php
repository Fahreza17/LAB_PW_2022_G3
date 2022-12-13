@extends('data.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Edit Student</div>
    <div class="card-body">

        <form action="{{ url('data/' .$data->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" value="PATCH">
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control"></br>
            <label>Product Name</label></br>
            <input type="text" name="productname" id="productname" value="{{$data->productname}}" class="form-control"></br>
            <label>Country</label></br>
            <input type="text" name="country" id="mobile" value="{{$data->country}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop