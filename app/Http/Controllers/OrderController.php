<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function all(){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $orders = Auth::user()->order;

        return View("orders.all", compact("orders"));

    }

    public function allOrders(){

        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $orders = Order::all();
        return View("admin.orders", compact("orders"));
    }

    
    public function checkout(){

        $carts = Auth::user()->cart;

        return View("orders.checkout", compact("carts"));
    }


    public function add(Request $request){

        if(Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }

        $data = $request->validate([
            "email" => "required|string|exists:users,email",
            "payment" => "required|string",
            "phone" => "required|numeric",
            "total_products" => "required",
            "total_price" => "required|integer",
            "code" => "required|integer",
        ]);

        $address = $request->validate([
            "flat" => "required|integer",
            "street" => "required|string|min:3",
            "city" => "required|string|min:3",
            "state" => "required|string|min:3",
            "country" => "required|string|min:3",
        ]);

        $flat = $address['flat'];
        $street = $address['street'];
        $city = $address['city'];
        $state = $address['state'];
        $country = $address['country'];
        $data['address'] = "flat no. $flat street $street / $city / $state / $country";
        $data['user_id'] = Auth::user()->id; 

        Order::create($data);
        $carts = Auth::user()->cart;

        foreach($carts as $cart){
            $cart->delete();
        }
        return redirect("order/checkout");
    }
}
