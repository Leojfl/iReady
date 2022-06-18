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
