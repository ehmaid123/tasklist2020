<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('tasks','TaskController@index');

