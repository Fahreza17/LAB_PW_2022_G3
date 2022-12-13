@extends('data.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Create New Data</div>
    <div class="card-body">

        <form action="{{ url('data') }}" method="post">
            {!! csrf_field() !!}
            <label>Name</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>
            <label>Product Name</label></br>
            <input type="text" name="productname" id="productname" class="form-control"></br>
            <label>Country</label></br>
            <input type="text" name="country" id="country" class="form-control"></br>
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop