<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/friends/insert', 'App\Http\Controllers\UserController@insert')->name('friend_insert');
Route::post('/refer/insert', 'App\Http\Controllers\UserController@referInsert')->name('refer_insert');
Route::get('/', 'App\Http\Controllers\UserController@show')->name('show');
Route::get('/projects/indicationsystem', 'App\Http\Controllers\UserController@show')->name('show');
Route::post('/users', 'App\Http\Controllers\UserController@restart')->name('restart');
