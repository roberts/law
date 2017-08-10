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
})->middleware('auth');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('desk', function () { return view('desk'); })->middleware('auth');
Route::get('conference', function () { return view('conference'); })->middleware('auth');
Route::get('accounting', function () { return view('accounting'); })->middleware('auth');
Route::get('/@{user}', 'UsersController@show');
Route::get('files', 'FilesController@index');
Route::group(['prefix' => 'files'], function () {
    Route::get('leads', 'FilesController@leads');
    Route::get('pre', 'FilesController@pre');
    Route::get('litigation', 'FilesController@litigation');
    Route::get('closed', 'FilesController@closed');
    Route::get('create', 'FilesController@create');
    Route::get('{file}', 'FilesController@show');
});
