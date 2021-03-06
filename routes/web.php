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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 


Route::get('importExport', 'ExportImportController@importExport');

Route::get('downloadExcel/{type}', 'ExportImportController@downloadExcel');

Route::post('importExcel', 'ExportImportController@importExcel');

Route::resources([
	'users' => 'UserController',
	'roles' => 'RoleController'
]);