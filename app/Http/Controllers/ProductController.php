<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    //All
    public function all(){

        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $products = Product::all();
        return View("products.all", compact("products"));
    }


    //add
    public function add(){

        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $categories = Category::all();
        return View("products.add", compact("categories"));
    }



    // addProduct
    public function addProduct(Request $request){

        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $data = $request->validate([
            "name" => "required|string|min:3|unique:products,name",
            "quantity" => "required|integer|gt:0",
            "category_id" => "required|integer",
            "price" => "required|numeric|gt:10",
            "image_01" => "required|image|mimes:jpeg,jpg,png,gif,webp",
            "image_02" => "required|image|mimes:jpeg,jpg,png,gif,webp",
            "image_03" => "required|image|mimes:jpeg,jpg,png,gif,webp",
            "details" => "required|string|min:10",
        ]);

        $data['image_01'] = Storage::putFile("products", $data['image_01']);
        $data['image_02'] = Storage::putFile("products", $data['image_02']);
        $data['image_03'] = Storage::putFile("products", $data['image_03']);

        Product::create($data);

        return redirect(url("admin/products"));
    }

    //update

    public function updateProduct($id){

        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $product = Product::findOrFail($id);
        return View("products.update", compact("product"));
    }


    //show
    public function show($id){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $product = Product::findOrFail($id);

        return View("products.show", compact("product"));
    }



    //update
    public function update(Request $request, $id){


        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $product = Product::findOrFail($id);


        $data = $request->validate([
            "name" => "required|string|min:3|unique:products,name",
            "quantity" => "required|integer|gt:0",
            "price" => "required|numeric|gt:10",
            "details" => "required|string|min:10",
        ]);


        if($request->image_01){
            Storage::delete($product->image_01);
            $data['image_01'] = $request->validate(["image_01" => "required|image|mimes:png,jpg,gif,jpeg,webp",])['image_01'];
            $data['image_01'] = Storage::putFile("categories", $data['image_01']);
        }else{
            $data['image_01'] = $product->image_01;
        }

        if($request->image_02){
            Storage::delete($product->image_02);
            $data['image_02'] = $request->validate(["image_02" => "required|image|mimes:png,jpg,gif,jpeg,webp",])['image_02'];
            $data['image_02'] = Storage::putFile("categories", $data['image_02']);
        }else{
            $data['image_02'] = $product->image_02;
        }

        if($request->image_03){
            Storage::delete($product->image_03);
            $data['image_03'] = $request->validate(["image_03" => "required|image|mimes:png,jpg,gif,jpeg,webp",])['image_03'];
            $data['image_03'] = Storage::putFile("categories", $data['image_03']);
        }else{
            $data['image_03'] = $product->image_03;
        }

        $product->update($data);
        return redirect(url("admin/products"));
    }



    // /delete 
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect("admin/products");
    }
    ///shop
    public function shop(){
        if(Auth::user() && Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $products = Product::all();

        return View("shop.all", compact("products"));
    }

    ///search
    public function productSearch(Request $request){
        
        $products = [];
        return View("products.search", compact("products"));
    }

    public function search(Request $request){
        $key = $request->validate([
            "search_key" => "required|string"
        ]);
        $key = $key['search_key'];
        $products = Product::select()->where("name", "Like", "%$key%")->orWhere("details", "Like", "%$key%")->get();
        return View("products.search", compact("products"));
    }
}
