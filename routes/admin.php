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
 * ============Routes restaurants ===================================
 */

Route::get(
    '/restaurant',
    'RestaurantController@index'
)->name('admin_restaurant_index');

Route::get(
    '/restaurant/upsert/{restaurantId?}',
    'RestaurantController@upsert'
)->name('admin_restaurant_upsert');


