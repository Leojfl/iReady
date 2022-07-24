<?php
use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'admin.index'
)->name('admin_index');


/**
 * ============Routes users ===================================
 */
Route::get(
    '/users',
    'UserController@index'
)->name('admin_users_index');


/**
 * ============Routes stores ===================================
 */

Route::get(
    '/store',
    'StoreController@index'
)->name('admin_store_index');

Route::get(
    '/store/upsert/{storeId?}',
    'StoreController@upsert'
)->name('admin_store_upsert');

Route::post(
    '/store/upsert/{storeId?}',
    'StoreController@upsertPost'
)->name('admin_store_upsert_post');

Route::get(
    '/store/profile/{storeId?}',
    'StoreController@show'
)->name('admin_store_profile');

