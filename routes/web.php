<?php

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

Route::get('desk', function () {
    return view('desk');
});

Route::get('conference', function () {
    return view('conference');
});

Route::get('accounting', function () {
    return view('accounting');
});

Route::get('fileroom', function () {
    return view('fileroom');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
