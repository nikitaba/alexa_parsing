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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::any('/alexa', 'AlexaController@index'); //http://linkfortest.xyz/alexa?domain=domain

Route::any('/alexa/{domain}', 'AlexaController@index'); //http://linkfortest.xyz/alexa/domain