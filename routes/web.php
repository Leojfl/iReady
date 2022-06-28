<?php

use Illuminate\Support\Facades\Route;
use Admin\RawMaterialController;

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


Route::view('/login', 'auth.login')
    ->name('login')
->middleware('guest');

Route::post('/login-post',
    'Auth\LoginController@autenticate')
    ->name('login_post');


Route::get('/logout',
    'Auth\LoginController@logout')
    ->name('logout')
    ->middleware('auth');



