<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', "HomeController@index")->name("home");
Route::get('/home/{id}', "HomeController@single")->name("single");

Route::get('/coming-soon', "HomeController@comingsoon")->name("coming-soon");

Route::get('/about', "PagesController@about")->name("about");
Route::get('/contact', "PagesController@contact")->name("contact");

Route::post("/send", "PhpmailerController@sendEmail")->name("sendMail");

Route::get('/register', "LoginController@register")->name("register");
Route::post('/register', "LoginController@doRegister")->name("doRegister");

Route::get('/login', "LoginController@login")->name("login");
Route::post('/login', "LoginController@doLogin")->name("doLogin");

Route::get('/logout', "LoginController@logout")->name("logout");

Route::group(['middleware' => 'admin'], function(){
    Route::resource("/admin/products", "Admin\ProductsController");
    Route::resource("/admin/users", "Admin\UsersController");
    Route::resource("/admin/categories", "Admin\CategoriesController");

    Route::get("/admin/statistics", "Admin\StatisticsController@index")->name("statistics");
});
