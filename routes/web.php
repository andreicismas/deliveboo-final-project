<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::prefix('auth')
    ->namespace('auth')
    ->middleware('auth')
    ->name("auth.")
    ->group(function () {   dishcontroller va spostato in auth?*/
        Route::middleware('auth');
    Route::post('/dishes', 'DishController@store')->name('dishes.store');
    Route::get('/dishes', 'DishController@index')->name('dishes.index');
    Route::get('/dishes/create', 'DishController@create')->name('dishes.create');
    Route::match(["PUT", "PATCH"], '/dishes/{dish}', 'DishController@update')->name('dishes.update');
    Route::get('/dishes/{dish}/edit', 'DishController@edit')->name('dishes.edit');
//});