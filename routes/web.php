<?php



Route::get('/','TaskController@index');
Route::get('tasks/{id}','TaskController@show');

Route::get('store','TaskController@store');
Route::get('delete/{id}','TaskController@destroy');


