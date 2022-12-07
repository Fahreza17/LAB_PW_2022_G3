<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show data descending
        $data = Data::orderBy('id', 'desc')->paginate(10);
        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('data.create');

        $model =  new Data();
        $model->name = $request->name;
        $model->productname = $request->productname;
        $model->country = $request->country;
        $model->save();
        return redirect('data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data::find($id);
        return view('data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //model
        $model = Data::find($id);
        $model->name = $request->name;
        $model->productname = $request->productname;
        $model->country = $request->country;
        $model->save();
        return redirect('data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Destroy data by id
        $data = Data::find($id);
        $data->delete();
        return redirect('data');
    }
}
