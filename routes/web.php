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

Route::get('/', function () { return view('desk'); })->middleware('auth');
Auth::routes();

Route::get('files', 'FilesController@index');
Route::group(['prefix' => 'files'], function () {
    Route::get('leads', 'FilesController@leads');
    Route::get('pre', 'FilesController@pre');
    Route::get('litigation', 'LitigationsController@index');
    Route::get('closed', 'FilesController@closed');
    Route::get('create', 'FilesController@create');
    Route::post('create', 'FilesController@store');
    Route::get('{filetype}/leads', 'FilesController@leads');
    Route::get('{filetype}/pre', 'FilesController@pre');
    Route::get('{filetype}/litigation', 'LitigationsController@filetypeindex');
    Route::group(['prefix' => '{filetype}/litigation'], function () {
	    Route::post('create', 'LitigationsController@store');
	    Route::post('{litigation}/notes', 'LitigationsController@storeNote');
	    Route::get('{litigation}', 'LitigationsController@show');
	});
    Route::get('{filetype}/closed', 'FilesController@closed');
    Route::post('{filetype}/{file}/notes', 'FilesController@storeNote');
    Route::get('{filetype}/{file}', 'FilesController@show');
    Route::get('{filetype}', 'FileTypesController@show');
});

Route::get('contacts', 'ContactsController@index');
Route::group(['prefix' => 'contacts'], function () {
	Route::get('organizations', 'OrganizationsController@index');
	Route::group(['prefix' => 'organizations'], function () {
		Route::get('firm', 'OrganizationsController@firm');
		Route::get('corporation', 'OrganizationsController@corporation');
		Route::get('llc', 'OrganizationsController@llc');
		Route::get('other', 'OrganizationsController@other');
	    Route::get('create', 'OrganizationsController@create');
	    Route::post('create', 'OrganizationsController@store');
	    Route::post('{organization}/notes', 'OrganizationsController@storeNote');
	    Route::get('{organization}', 'OrganizationsController@show');
	});
	Route::get('persons', 'PersonsController@index');
	Route::group(['prefix' => 'persons'], function () {
		Route::get('male', 'PersonsController@male');
		Route::get('female', 'PersonsController@female');
	    Route::get('create', 'PersonsController@create');
	    Route::post('create', 'PersonsController@store');
	    Route::post('{person}/notes', 'PersonsController@storeNote');
	    Route::get('{person}', 'PersonsController@show');
	});
});

Route::get('conference', function () { return view('conference'); })->middleware('auth');
Route::get('accounting', function () { return view('accounting'); })->middleware('auth');
