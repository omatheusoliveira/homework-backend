<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/users/create', 'App\Http\Controllers\UserController@create');
Route::get('/users/list', 'App\Http\Controllers\UserController@list');
Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@delete');
Route::put('/users/update/{id}', 'App\Http\Controllers\UserController@update');


Route::post('/sale/create', 'App\Http\Controllers\SaleController@create');
Route::get('/sale/list/{id}', 'App\Http\Controllers\SaleController@list');


Route::get('/send-email', 'App\Http\Controllers\EmailController@SendEmail');