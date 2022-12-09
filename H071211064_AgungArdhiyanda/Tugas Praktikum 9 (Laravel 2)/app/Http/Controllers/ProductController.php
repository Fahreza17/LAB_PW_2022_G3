<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        $category = Category::all();
        $seller = Seller::all();

        return view("product", ["data" => $data, "seller" => $seller, "category" => $category]);
    }

    public function store(request $request)
    {
        $nama = $request->nama;
        $seller = $request->seller;
        $category = $request->category;
        $price = $request->price;
        $status = $request->status;


        Product::create(["nama" => $nama, "seller_id" => $seller, "category_id" => $category, "price" => $price, "status" => $status]);
        return redirect("/");
    }
    public function edit($id)
    {
        $data = Product::where("id", $id)->get();
        $data = $data[0];

        return view("EditP", ["data" => $data]);
    }

    public function update(Request $request, $id)
    {

        $nama = $request->nama;
        $seller = $request->seller;
        $category = $request->category;
        $price = $request->price;
        $status = $request->status;

        Product::where("id", $id)->update(["nama" => $nama, "seller_id" => $seller, "category_id" => $category, "price" => $price, "status" => $status]);

        $data = Product::all();
        return redirect("/");
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect("/");
    }
}
