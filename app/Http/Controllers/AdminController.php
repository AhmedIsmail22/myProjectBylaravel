<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    //loginForm
    public function loginForm (){
        return View("admin.login", ["error" => null]);
    }


    //dashboard
    public function dashboard(){

        $products = count(Product::all());
        $users = count(User::where("role", "=", "user")->get());
        $admins = count(User::where("role", "=", "admin")->get());
        $messages = count(Message::select()->where("status","unread")->get());

        $data  = [
            "products" => $products,
            "users" => $users,
            "admins" => $admins,
            "messages" => $messages,
        ];

        return View("admin.dashboard", $data);
    }


    //show User
    public function showUsers(){

        $users = User::where("role", "=", "user")->get();

        return View("users.all", compact("users"));
    }

    //deleteUser

    public function deleteUser($id){

        $user = User::findOrFail($id);

        $user->delete();
        return redirect(url("admin/users"));
    }


    //all
    public function showAdmins(){

        $admins = User::where("role", "=", "admin")->get();

        return View("admin.all", compact("admins"));
    }

    //registerForm
    public function registerAdmin(){

        return View("admin.register");
    }


    //addadmin
    public function addAdmin(Request $request){

        $data = $request->validate([
            "name" => "required|string|min:3",
            "password" => "required|string|min:3",
        ]);
        $data['password'] = bcrypt($data['password']);
        // $data[] = 
        $email = $data['name'] ."admin@gmail.com";
         User::create([...$data, "email" => $email, "role" => "admin"]);
        return redirect(url("admin/admins"));
    }


    //updateForm
    public function updateForm($id){

        $admin = User::findOrFail($id);

        return View("admin.update", compact("admin"));
    }


    //update
    public function update(Request $request, $id){

        $admin = User::findOrFail($id);

        $data = $request->validate([
            "name" => "required|string|min:3",
            "password" => "required|current_password",
        ]);

        if($request->newPassword){
            $data['newPassword'] = $request->validate(["newPassword" => "required|string|min:3|"])['newPassword'];
            $admin->update(["name"=>$data['name'], "password"=>bcrypt($data['newPassword'])]);
        }else{
            $admin->update(["name"=>$data['name']]);
        }
        return redirect(url("admin/admins"));
    }


    //delete
    public function delete($id){

        $admin = User::findOrFail($id);

        $admin->delete();
        return redirect(url("admin/admins"));
    }
}

