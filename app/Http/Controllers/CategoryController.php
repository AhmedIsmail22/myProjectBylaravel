<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    //all
    public function all(){

        $categories = Category::all();
        return View("categories.all", compact("categories"));
    }


    //addForm
    public function addForm(){

        return View("categories.add");
    }


    //add category
    public function add(Request $request){


        $data = $request->validate([
            "name" => "required|string|min:3|unique:categories,name",
            "image" => "required|image|mimes:png,jpg,gif,jpeg,webp",
            "desc" => "required|min:10|string|max:150"
        ]);
        
        $data['image'] = Storage::putFile("categories", $data['image']);
        Category::create([...$data, "num_of_products" => 0]);
        return redirect(url("admin/categories"));
    }


    //updateform
    public function updateForm(Request $request, $id){

        $category = Category::findOrFail($id);
        return View("categories.update", compact("category"));
    }


    // update
    public function update(Request $request, $id){

        $data = $request->validate([
            "name" => "required|string|min:3",
            "desc" => "required|min:10|string|max:150"
        ]);

        $category = Category::findOrFail($id);
        if($request->image){
            Storage::delete($category->image);
            $data['image'] = $request->validate(["image" => "required|image|mimes:png,jpg,gif,jpeg,webp",])['image'];
            $data['image'] = Storage::putFile("categories", $data['image']);
        }else{
            $data['image'] = $category->image;
        }
        $category->update($data);
        
        return redirect(url("admin/categories"));
    }

    //delete

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect("admin/categories");
    }
}


