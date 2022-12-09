<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
   
    public function index(){
        $data = Seller::all();
        return view('seller', ["data" => $data]);
    }

    public function store(request $request) {
        $nama = $request->nama;
        $alamat= $request->alamat;
        $gender= $request->gender;
        $nohp= $request->nohp;
        $status= $request->status;

        Seller::create(["nama"=> $nama, "address"=> $alamat, "gender"=> $gender, "no_hp"=> $nohp, "status"=> $status]);
        return redirect("/s");

    }

    public function edit($id){
        $data = Seller::where("id", $id)->get();
        $data = $data[0];

        return view("editS", ["data" => $data]);
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
        Seller::destroy($id);
        return redirect("/s");
    }
}
