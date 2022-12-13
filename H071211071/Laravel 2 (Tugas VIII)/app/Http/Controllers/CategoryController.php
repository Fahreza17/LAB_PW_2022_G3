<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::all();
        return view('category', ["data" => $data]);
    }

    public function store(request $request) {
        $nama = $request->nama;
        $status= $request->status;

        Category::create(["nama"=> $nama, "status"=> $status]);
        return redirect("/c");

    }

    public function edit($id){
        $data = Category::where("id", $id)->get();
        $data = $data[0];

        return view("editC", ["data" => $data]);
    }

    public function update(Request $request, $id) {

        $nama = $request->nama;
        $status= $request->status;

        Category::where("id", $id)->update(["nama"=> $nama, "status"=> $status]);

        $data = Category::all();
        return redirect("/c");

    }

    public function Delete($id){
        try {
            Category::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect("/c");
    }
}
