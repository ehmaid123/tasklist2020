<?php



Route::get('/','TaskController@index');
Route::get('tasks/{id}','TaskController@show');

Route::post('store','TaskController@store');
Route::delete('delete/{id}','TaskController@destroy');


Route::put('edit/{id}','TaskController@edit');
Route::patch('updata/{id}','TaskController@updata');


