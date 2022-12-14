<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\SellerPermission;

class SellerController extends Controller
{
   
    public function index(){
        $data = Seller::all();
        $permission = Permission::all();
        // dd($permission);
        return view('seller', ["data" => $data, "permission_id" => $permission]);
    }

    public function store(request $request) {
        $nama = $request->nama;
        $alamat= $request->alamat;
        $gender= $request->gender;
        $nohp= $request->nohp;
        $status= $request->status;
        $permission = $request->permission_id;

        $seller = Seller::create(["nama"=> $nama, "address"=> $alamat, "gender"=> $gender, "no_hp"=> $nohp, "status"=> $status, ""]);
        SellerPermission::create(["permission_id" => $permission, "seller_id" => $seller->id]);
        return redirect("/s");

    }

    public function edit($id){
        $data = Seller::where("id", $id)->get();
        $data = $data[0];
        $permission = Permission::all();


        return view("editS", ["data" => $data, "permission_id" => $permission ]);
    }

    public function update(Request $request, $id) {

        $nama = $request->nama;
        $alamat= $request->alamat;
        $gender= $request->gender;
        $nohp= $request->nohp;
        $status= $request->status;

        Seller::where("id", $id)->update(["nama"=> $nama, "address"=> $alamat, "gender"=> $gender, "no_hp"=> $nohp, "status"=> $status]);

        $data = Seller::all();
        return redirect("/s");

    }

    public function Delete($id){
        try {
            Seller::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect("/c");
    }
}
