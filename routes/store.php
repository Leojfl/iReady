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

// ======================== Data ====================

Route::get(
    '/store/upsert/{storeId?}',
    'StoreDataController@upsert'
)->name('store_storedata_upsert');

Route::post(
    '/store/upsert/{storeId?}',
    'StoreDataController@upsertPost'
)->name('store_storedata_upsert_post');

Route::get(
    '/store/profile/{storeId?}',
    'StoreDataController@show'
)->name('store_storedata_profiles');

// ======================== Boards ====================

Route::get(
    '/store',
    'BoardController@index'
)->name('store_board_index');

Route::get(
    '/store/board/upsert/{boardId?}',
    'BoardController@upsert'
)->name('store_board_upsert');

Route::post(
    '/store/board/upsert/{boardId?}',
    'BoardController@upsertPost'
)->name('store_board_upsert_post');

Route::get(
    '/store/board/profile/{boardId?}',
    'BoardController@show'
)->name('store_board_profile');

Route::delete('/store/board/{boardId?}',
 'BoardController@destroy'
 )->name('store_board_delete');

////////////// rutas StoreData//////////////////

//Route::get('/storedata', 'StoreDataController@index')->name('store_data_index');
//Route::get('/storedata/create', 'StoreDataController@create')->name('store_data_create');
//Route::post('/storedata/store', 'StoreDataController@store')->name('store_data_store');
//Route::get('/storedata/edit/{id}', 'StoreDataController@edit')->name('store_data_edit');
//Route::post('/storedata/update/{id}', 'StoreDataController@update')->name('store_data_update');
//Route::delete('/storedata/delete/{id}', 'StoreDataController@destroy')->name('store_data_delete');

