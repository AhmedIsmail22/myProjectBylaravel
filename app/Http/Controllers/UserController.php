<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm (){
        return View("users.login", ["error" => ""]);
    }

    public function registerForm (){
        return View("users.register");
    }

    public function register (Request $request){

        $data = $request->validate([
            "name" => "required|string|min:3",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6",
        ]);
        $data['password'] = bcrypt($data["password"]);
        User::create($data);
        return redirect(url("login"));
    }

    public function login(Request $request){
        $data = $request->validate([
            "name" => "required|exists:users,name",
            "password" => "required",
        ]);
        $is_login = Auth::attempt(["name" => $data['name'],"password" => $data['password']]);
        $user = Auth::user()->role;
        if($is_login != true){
            if($user == "admin"){
                return View("admin.login", ["error" => "The data you entered is wrong"]);
            }else {
                return View("users.login", ["error" => "The data you entered is wrong"]);
            }
        }else {
            if($user == "admin"){
                return redirect(url("admin/dashboard"));
            }else {
                return redirect(url("home"));
            }
        }
    }

    public function loginUser(Request $request){
        $data = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if($request->email == "admin@gmail.com"){
            return redirect(url("login"));
        }
        $is_login = Auth::attempt(["email" => $data['email'],"password" => $data['password']]);
        if($is_login != true){
            return View("users.login", ["error" => "The data you entered is wrong"]); 
        }else {
            return redirect(url("home"));
        }
    }

    public function updateForm(){
        
        if(Auth::user()->role == "user"){
            return View("users.profile");
        }else {
            return View("admin.profile");
        }
    }

    public function update(Request $request){
        $data = $request->validate([
            "name" => "required|string|min:3",
            "email" => "required|email",
            "password" => "required|current_password",
            "new_pass" => "required|min:6",
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if(Auth::user()->email != $request['email']){
            $data['email'] = $request->validate(["email" => "unique:users,email"])['email'];
        }
        $user->update(["name" => $data['name'],"email" => $data['email'],"password" => bcrypt($data['new_pass'])]);

        session()->flash("success", "Profile is updated");
        return redirect(url("home"));
    }
    public function logout(){
        $user = Auth::user()->role ;
        Auth::logout();
        if($user == "admin"){
            return redirect(url("admin/login"));
        }else {
            return redirect(url("login"));
        }  
    }

    public function home(){
        $user = Auth::user()->role ;
        Auth::logout();
        if($user == "admin"){
            return redirect(url("admin/dashboard"));
        }else {
            return redirect(url("login"));
        }

        
    }
}
