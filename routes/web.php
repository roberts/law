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

Route::get('files', function () {
    return view('files.index');
});

Route::get('files/leads', function () {
    return view('files.leads');
});

Route::get('files/pre', function () {
    return view('files.pre');
});

Route::get('files/litigation', function () {
    return view('files.litigation');
});

Route::get('files/closed', function () {
    return view('files.closed');
});

Route::get('files/create', function () {
    return view('files.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
