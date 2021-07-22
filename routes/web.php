<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Binding per lo user_id
https://laravel.com/docs/8.x/routing#implicit-model-binding-scoping*/

use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Sarà la Dashboard dell'UR
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
->group(function () {
    //Qualora suddividessimo le views in cartelle

    //ORDERS
    Route::get("/orders", "OrderController@index")->name("orders.index"); 
    //valutare se e come passare lo user_id come argomento
    //Route::get("/orders/user/{user}", "OrderController@index")->name("orders.index");

    Route::post("/orders", "OrderController@store")->name("orders.store"); 
    //valutare se e come passare lo user_id come argomento
    //Route::post("/orders/user/{user}", "OrderController@store")->name("orders.store");

    Route::get("/orders/create", "OrderController@create")->name("orders.create");
    Route::get("/orders/{order}", "OrderController@show")->name("orders.show");

    //DISHES
    Route::get("/dishes", "DishController@index")->name("dishes.index"); 
    //valutare se e come passare lo user_id come argomento
    //Route::get("/dishes/user/{user}", "DishController@index")->name("dishes.index"); 

    Route::post("/dishes", "DishController@store")->name("dishes.store");
    Route::get("/dishes/create", "DishController@create")->name("dishes.create");
    Route::get("/dishes/{dish}", "DishController@show")->name("dishes.show");
    Route::match(["put", "patch"], "/dishes/{dish}", "DishController@update")->name("dishes.update");
    Route::delete("/dishes/{dish}", "DishController@destroy")->name("dishes.destroy");
    Route::get("/dishes/{dish}/edit", "DishController@edit")->name("dishes.edit");
    
    //Rotta unica, scegliete voi
    Route::resource("/dishes", "DishController");    
});

