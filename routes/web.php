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


Route::get('/materia', 'Admin\RawMaterialController@index')->name('raw_material_index');
Route::get('/materia/create', 'Admin\RawMaterialController@create')->name('raw_material_create');
Route::post('/materia/store', 'Admin\RawMaterialController@store')->name('raw_material_store');
Route::get('/materia/edit/{id}', 'Admin\RawMaterialController@edit')->name('raw_material_edit');
Route::post('/materia/update/{id}', 'Admin\RawMaterialController@update')->name('raw_material_update');
Route::delete('/materia/delete/{id}', 'Admin\RawMaterialController@destroy')->name('raw_material_delete');

    // ->middleware('auth');
