<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    //form
    public function messageForm(){
        if(Auth::user() && Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        return View("contact.contact");
    }

    //send
    public function send(Request $request){

        if(Auth::user() && Auth::user()->role == "admin"){
            return redirect(url("admin/dashboard"));
        }
        $data = $request->validate([
            "name" => "required|string|min:3",
            "email" => "required|email",
            "phone" => "required|numeric",
            "message" => "required|string|min:9",
        ]);

        Message::create([...$data, "user_id" => Auth::user()?Auth::user()->id:1]);
        session()->flash("success", "message is sended");
        return redirect("contact");
    }


    //show
    public function show(){
        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }

        $newMessages = Message::select()->where("status", "=", "unread")->orderBy("created_at", "desc")->get();
        $oldMessages = Message::select()->where("status", "=", "read")->orderBy("created_at", "desc")->get();
        foreach($newMessages as $message){
            $message->update(["status"=>"read"]);
        }

        return View("messages.all", compact("newMessages","oldMessages"));
    }

    //delete
    public function delete($id){
        if(Auth::user()->role == "user"){
            return redirect(url("/"));
        }
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect(url("admin/messages"));
    }
}
