<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


    //All
    public function all (){
        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $carts = Auth::user()->cart;
        
        return View("cart.all", compact("carts"));
    }

    ///add to cart
    public function add(Request $request){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $data = $request->validate([
            "product_id" => "unique:carts,product_id|exists:products,id",
            "quantity" => "required|integer",
        ]);

        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;

        Cart::create($data);
        DB::table('wishlists')->where("product_id", "=", $data['product_id'])->delete();
        session()->flash("success", "added to cart!");
        return back();
    }


    //update cart
    public function update(Request $request, $id){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $data = $request->validate([
            "product_id" => "unique:carts,product_id|exists:products,id",
            "quantity" => "required|integer",
        ]);

        $cart = Cart::findOrFail($id);
        $cart->update($data);
        session()->flash("success", "quantity is updated!");
        return redirect(url("cart/all"));
    }


    // delete cart
    public function delete($id){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect(url("cart/all"));
    }


    //delete All
    public function deleteAll(){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $carts = Auth::user()->cart;
        foreach($carts as $cart){
            $cart->delete();
        }

        return redirect(url("cart/all"));
        // dd(Auth::user()->cart);
    }
}
