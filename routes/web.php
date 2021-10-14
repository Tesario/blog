<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'PostController@index');
Route::resource('post', 'PostController');

Route::resource('category', 'CategoryController');

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::get('user/{id}/profile', 'ProfileController@show');
Route::get('user/{id}/profile/edit', 'ProfileController@edit');
Route::post('user/{id}/profile/edit', 'ProfileController@update');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
