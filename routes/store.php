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

///////////// RawMaterial /////////////////////////////

Route::get('/materia', 'RawMaterialController@index')->name('raw_material_index');
Route::get('/materia/create', 'RawMaterialController@create')->name('raw_material_create');
Route::post('/materia/store', 'RawMaterialController@store')->name('raw_material_store');
Route::get('/materia/edit/{id}', 'RawMaterialController@edit')->name('raw_material_edit');
Route::post('/materia/update/{id}', 'RawMaterialController@update')->name('raw_material_update');
Route::delete('/materia/delete/{id}', 'RawMaterialController@destroy')->name('raw_material_delete');

///////////// Employee /////////////////////////////

Route::get('/employee', 'EmployeeController@index')->name('employee_index');
Route::get('/employee/create', 'EmployeeController@create')->name('employee_create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee_store');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee_edit');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee_update');
Route::delete('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee_delete');
