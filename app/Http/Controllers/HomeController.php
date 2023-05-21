<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    //show
    public function show(){
        $categories = Category::all();
        $products = Product::all();
        return View("home.home", compact("categories", "products"));
    }
}
