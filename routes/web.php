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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/','TaskController@home');

Route::get('task/{id}','TaskController@show');

Route::post('store','TaskController@store')->name('store');

Route::delete('delete/{id}','TaskController@destroy');

Route::post('edit/{id}','TaskController@edit');

Route::post('update/{id}','TaskController@update');