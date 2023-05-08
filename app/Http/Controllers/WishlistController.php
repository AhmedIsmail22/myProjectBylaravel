<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function all (){

        $wishlists = Auth::user()->wishlist;
        
        return View("wishlist.all", compact("wishlists"));
    }

    //add
    public function add(Request $request){
        $data = $request->validate([
            "product_id" => "unique:wishlists,product_id|unique:carts,product_id|exists:products,id",
        ]);

        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;

        Wishlist::create($data);
        session()->flash("success", "added to wishlist!");
        return back();
    }

    public function delete($id){

        $wishlist = Wishlist::firstWhere('product_id', $id);
        $wishlist->delete();

        return redirect(url("wishlist/all"));
    }

    public function deleteAll(){

        $wishlists = Auth::user()->wishlist;
        // dd($wishlists);
        foreach($wishlists as $wishlist){
            $wishlist->delete();
        }

        return redirect(url("cart/all"));
        // dd(Auth::user()->cart);
    }
}
