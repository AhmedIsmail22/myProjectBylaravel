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
    Route::get("register", [UserController::class, "registerForm"]);
    Route::post("register", [UserController::class, "register"]);
    Route::get("login", [UserController::class, "loginForm"]);
    Route::post("login", [UserController::class, "loginUser"]);
    Route::get("logout", [UserController::class, "logout"]);
});


//Is Login
Route::middleware("auth")->group(function(){
    Route::get("admin/dashboard", [AdminController::class, "dashboard"]);

    //products
    Route::get("admin/products", [ProductController::class, "all"]);
    Route::get("admin/products/add", [ProductController::class, "add"]);
    Route::post("admin/products/add", [ProductController::class, "addProduct"]);
    Route::get("admin/products/update/{id}", [ProductController::class, "updateProduct"]);
    Route::get("admin/products/delete/{id}", [ProductController::class, "delete"]);
    Route::post("admin/products/update/{id}", [ProductController::class, "update"]);
    Route::get("product/show/{id}", [ProductController::class, "show"]);

    //categories
    Route::get("admin/categories", [CategoryController::class, "all"]);
    Route::get("admin/categories/add", [CategoryController::class, "addForm"]);
    Route::post("admin/categories/add", [CategoryController::class, "add"]);
    Route::get("admin/categories/update/{id}", [CategoryController::class, "updateForm"]);
    Route::post("admin/categories/update/{id}", [CategoryController::class, "update"]);
    Route::get("admin/categories/delete/{id}", [CategoryController::class, "delete"]);

    //users
    Route::get("profile/updateForm", [UserController::class, "updateForm"]);
    Route::post("profile/update", [UserController::class, "update"]);
    //admins
    Route::get("admin/users", [AdminController::class, "showUsers"]);
    Route::get("admin/users/delete/{id}", [AdminController::class, "deleteUser"]);
    Route::get("admin/admins", [AdminController::class, "showAdmins"]);
    Route::get("admin/register", [AdminController::class, "registerAdmin"]);
    Route::post("admin/register", [AdminController::class, "addAdmin"]);
    Route::get("admin/update/{id}", [AdminController::class, "updateForm"]);
    Route::post("admin/update/{id}", [AdminController::class, "update"]);
    Route::get("admin/delete/{id}", [AdminController::class, "delete"]);
    Route::get("admin/message/delete/{id}", [MessageController::class, "delete"]);
    Route::get("admin/messages", [MessageController::class, "show"]);

    //cart
    Route::get("cart/all", [CartController::class, "all"]);
    Route::post("cart/add/{id}", [CartController::class, "add"]);
    Route::post("cart/update/{id}", [CartController::class, "update"]);
    Route::post("cart/delete/{id}", [CartController::class, "delete"]);
    Route::get("cart/delete/all", [CartController::class, "deleteAll"]);

    //wishlist
    Route::get("wishlist/all", [WishlistController::class, "all"]);
    Route::post("wishlist/add/{id}", [WishlistController::class, "add"]);
    Route::post("wishlist/delete/{id}", [WishlistController::class, "delete"]);
    Route::get("wishlist/delete/all", [WishlistController::class, "deleteAll"]);


    // order
    Route::get("order/checkout", [OrderController::class, "checkout"]);
    Route::post("order/add", [OrderController::class, "add"]);
    Route::get("orders", [OrderController::class, "all"]);
    Route::get("admin/orders", [OrderController::class, "allOrders"]);

    //shop
;    Route::get("logout", [UserController::class, "logout"]);
});

//any one
Route::get("home", [HomeController::class, "show"]);
Route::get("/", [HomeController::class, "show"]);
Route::get("contact", [MessageController::class, "messageForm"]);
Route::post("message/send", [MessageController::class, "send"]);
Route::get("shop", [ProductController::class, "shop"]);
Route::get("search", [ProductController::class, "productSearch"]);
Route::post("search", [ProductController::class, "search"]);
Route::get("about", function(){
    return View("about.about");
});

