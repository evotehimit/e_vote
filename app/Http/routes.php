<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CandidateController@index');
Route::get('login', 'LoginCandidateController@getlogin');
Route::get('logout', 'LoginCandidateController@logout');
Route::post('login', 'LoginCandidateController@postlogin');
Route::get('dashboard', 'CandidateController@dashboard');
Route::post('dashboard/editpass', 'CandidateController@changepassword');
Route::post('dashboard/datapribadi', 'CandidateController@inputpribadi');
Route::post('dashboard/uploaddata', 'CandidateController@upload');

Route::get('admin', 'AdminController@index');
Route::get('adminlogin', 'LoginAdminController@getlogin');
Route::post('adminlogin', 'LoginAdminController@postlogin');
Route::get('adminlogout', 'LoginAdminController@logout');
Route::get('admindashboard', 'AdminController@dashboard');
Route::post('admin/tambahkandidat', 'AdminController@tambahkandidat');
