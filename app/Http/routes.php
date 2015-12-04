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
Route::post('dashboard/daftarcawaka', 'CandidateController@daftarcawaka');
Route::post('dashboard/datapribadi', 'CandidateController@inputpribadi');
Route::post('dashboard/pendidikan', 'CandidateController@pendidikan');
Route::post('dashboard/prestasi', 'CandidateController@prestasi');
Route::post('dashboard/organisasi', 'CandidateController@organisasi');
Route::post('dashboard/pelatihan', 'CandidateController@pelatihan');
