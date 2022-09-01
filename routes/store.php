<?php

use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'store.index'
)->name('store_index');


// ======================== Products ====================

Route::get(
    '/products',
    'ProductController@index'
)->name('store_products_index');

Route::get(
    '/product/upsert/{productId?}',
    'ProductController@upsert'
)->name('store_product_upsert');


Route::post(
    '/product/upsert/{productId?}',
    'ProductController@upsertPost'
)->name('store_product_upsert_post');

Route::get(
    '/product/upsert/status/{productId?}',
    'ProductController@upsertStatus'
)->name('store_product_upsert_status');

Route::get(
    '/product/show/{productId?}',
    'ProductController@show'
)->name('store_product_show');





Route::get('/materia', 'RawMaterialController@index')->name('raw_material_index');
Route::get('/materia/create', 'RawMaterialController@create')->name('raw_material_create');
Route::post('/materia/store', 'RawMaterialController@store')->name('raw_material_store');
Route::get('/materia/edit/{id}', 'RawMaterialController@edit')->name('raw_material_edit');
Route::post('/materia/update/{id}', 'RawMaterialController@update')->name('raw_material_update');
Route::delete('/materia/delete/{id}', 'RawMaterialController@destroy')->name('raw_material_delete');

///////////// Employee /////////////////////////////

Route::get('/employee', 'EmployeeController@index')->name('store_employee_index');
Route::get('/employee/upsert/{id?}', 'EmployeeController@create')->name('store_employee_upsert');
Route::get(
    '/employee/show/{id?}',
    'EmployeeController@show'
)->name('store_employee_show');

Route::post('/employee/update/{id?}', 'EmployeeController@update')->name('store_employee_update');
Route::get('/employee/delete/{id}', 'EmployeeController@destroy')->name('store_employee_delete');
Route::resource('employees', App\Http\Controllers\Store\AuthorController::class);
