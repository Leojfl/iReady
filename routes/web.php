<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',
'Auth\LoginController@home');

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

Route::get('/home',
'Auth\LoginController@home')
->name('home');

Route::get('/menu/{nameStore}',
'Web\WebController@menu')
->name('menu');


Route::get('/chart',
'Web\WebController@chart')
->name('chart_test');

