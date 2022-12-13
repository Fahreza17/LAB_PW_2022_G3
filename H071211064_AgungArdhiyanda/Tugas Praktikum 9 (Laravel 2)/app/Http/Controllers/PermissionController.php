<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        $data = Permission::all();
        return view('permission', ["data" => $data]);
    }

    public function store(request $request) {
        $nama = $request->nama;
        $deskripsi = $request->desk;
        $status= $request->status;

        Permission::create(["nama"=> $nama, "description"=> $deskripsi, "status"=> $status]);
        return redirect("/pe");
    }

    public function edit($id){
        $data = Permission::where("id", $id)->get();
        $data = $data[0];

        return view("editPE", ["data" => $data]);
    }

    public function update(Request $request, $id) {

        $nama = $request->nama;
        $deskripsi = $request->desk;
        $status= $request->status;

        Permission::where("id", $id)->update(["nama"=> $nama, "description"=> $deskripsi, "status"=> $status]);

        $data = Permission::all();
        return redirect("/pe");
    }

    public function Delete($id){
        Permission::destroy($id);
        return redirect("/pe");
    }
}
