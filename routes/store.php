<?php
use Illuminate\Support\Facades\Route;
use Store\RawMaterialController;


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

Route::get('/materia', 'Store\RawMaterialController@index')->name('raw_material_index');
Route::get('/materia/create', 'Store\RawMaterialController@create')->name('raw_material_create');
Route::post('/materia/store', 'Store\RawMaterialController@store')->name('raw_material_store');
Route::get('/materia/edit/{id}', 'Store\RawMaterialController@edit')->name('raw_material_edit');
Route::post('/materia/update/{id}', 'Store\RawMaterialController@update')->name('raw_material_update');
Route::delete('/materia/delete/{id}', 'Store\RawMaterialController@destroy')->name('raw_material_delete');
