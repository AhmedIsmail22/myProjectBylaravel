<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//No Login
Route::middleware("guest")->group(function(){
    //admin
    Route::get("admin/login", [AdminController::class, "loginForm"]);
    Route::post("admin/login", [UserController::class, "login"]);

    //user
    Route::controller(UserController::class)->group(function(){

        Route::get("register", "registerForm");
        Route::post("register", "register");
        Route::get("login", "loginForm");
        Route::post("login", "loginUser");
        Route::get("logout", "logout");
    });
});


//Is Login
Route::middleware("auth")->group(function(){
    Route::get("admin/dashboard", [AdminController::class, "dashboard"]);

    //products
    Route::controller(ProductController::class)->group(function(){
        Route::get("admin/products", "all");
        Route::get("admin/products/add", "add");
        Route::post("admin/products/add", "addProduct");
        Route::get("admin/products/update/{id}", "updateProduct");
        Route::get("admin/products/delete/{id}", "delete");
        Route::post("admin/products/update/{id}", "update");
        Route::get("product/show/{id}", "show");
    });

    //categories
    Route::controller(CategoryController::class)->group(function(){

        Route::get("admin/categories", "all");
        Route::get("admin/categories/add", "addForm");
        Route::post("admin/categories/add", "add");
        Route::get("admin/categories/update/{id}", "updateForm");
        Route::post("admin/categories/update/{id}", "update");
        Route::get("admin/categories/delete/{id}", "delete");
    });

    //users
    Route::controller(UserController::class)->group(function(){

        Route::get("profile/updateForm", "updateForm");
        Route::post("profile/update", "update");
        Route::get("logout","logout");
    });
    //admins
    Route::controller(AdminController::class)->group(function(){

        Route::get("admin/users", "showUsers");
        Route::get("admin/users/delete/{id}", "deleteUser");
        Route::get("admin/admins", "showAdmins");
        Route::get("admin/register", "registerAdmin");
        Route::post("admin/register", "addAdmin");
        Route::get("admin/update/{id}", "updateForm");
        Route::post("admin/update/{id}", "update");
        Route::get("admin/delete/{id}", "delete");
    });

    //message
    Route::controller(MessageController::class)->group(function(){

        Route::get("admin/message/delete/{id}","delete");
        Route::get("admin/messages","show");
    });

    //cart
    Route::controller(MessageController::class)->group(function(){

        Route::get("cart/all","all");
        Route::post("cart/add/{id}","add");
        Route::post("cart/update/{id}","update");
        Route::post("cart/delete/{id}","delete");
        Route::get("cart/delete/all","deleteAll");
    });

    //wishlist
    Route::controller(WishlistController::class)->group(function(){

        Route::get("wishlist/all","all");
        Route::post("wishlist/add/{id}","add");
        Route::post("wishlist/delete/{id}","delete");
        Route::get("wishlist/delete/all","deleteAll");
    });


    // order
    Route::controller(OrderController::class)->group(function(){

        Route::get("order/checkout","checkout");
        Route::post("order/add","add");
        Route::get("orders","all");
        Route::get("admin/orders","allOrders");
    });

});

//any one
Route::controller(HomeController::class)->group(function(){
    Route::get("home", "show");
Route::get("/", "show");
});

Route::controller(MessageController::class)->group(function(){
    Route::get("contact","messageForm");
Route::post("message/send","send");
});

Route::controller(ProductController::class)->group(function(){
    Route::get("shop", "shop");
Route::get("search", "productSearch");
Route::post("search", "search");
});



Route::get("about", function(){
    return View("about.about");
});

