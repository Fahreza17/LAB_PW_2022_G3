@extends('data.layout')
@section('content')
    <div class="container">
            <div class="row" style="margin:20px;">
                    <div class="col-12">
                            <div class="card">
                                    <div class="card-header">
                                            <h2>DASHBOARD</h2>
                                        </div>
                                    <div class="card-body">
                                            <a href="{{ url('/data/create') }}" class="btn btn-success btn-sm" title="Add New Data">
                                                    Add New
                                                </a>
                                            <div class="table-responsive">
                                                    <table class="table">
                                                            <thead>
                                                                    <tr>
                                                                            <th>Name</th>
                                                                            <th>Product Name</th>
                                                                            <th>Country</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                </thead>
                                                            <tbody>
                                                                @foreach($data as $item)
                                                                    <tr>
                                                                      
                                                                            <td>{{ $item->name }}</td>
                                                                            <td>{{ $item->productname }}</td>
                                                                            <td>{{ $item->country}}</td>
                                      
                                                                            <td>
                                                                                    <a href="{{ url('/data/' . $item->id . '/edit') }}" title="Edit Data"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                          
                                                                                    <form method="POST" action="{{ url('/data' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                                            {{ method_field('DELETE') }}
                                                                                            {{ csrf_field() }}
                                                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm(Confirm delete?;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                                                        </form>
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
        </div>
@endsection