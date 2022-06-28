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

////////////// rutas StoreData//////////////////
Route::get('/storedata', 'Store\StoreDataController@index')->name('store_data_index');
Route::get('/storedata/create', 'Store\StoreDataController@create')->name('store_data_create');
Route::post('/storedata/store', 'Store\StoreDataController@store')->name('store_data_store');
Route::get('/storedata/edit/{id}', 'Store\StoreDataController@edit')->name('store_data_edit');
Route::post('/storedata/update/{id}', 'Store\StoreDataController@update')->name('store_data_update');
Route::delete('/storedata/delete/{id}', 'Store\StoreDataController@destroy')->name('store_data_delete');

