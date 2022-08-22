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


// ======================== Products ====================

Route::get(
    '/data',
    'StoreDataController@show'
)->name('store_data_show');

Route::get(
    '/update/data',
    'StoreDataController@update'
)->name('store_update_data');

Route::post(
    '/update/data',
    'StoreDataController@updatePost'
)->name('store_update_data_post');

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

Route::get('/store/board/{boardId?}',
 'BoardController@destroy'
 )->name('store_board_delete');

 // ======================== Tickets ====================

 Route::get(
    '/store/ticket',
    'TicketController@index'
)->name('store_ticket_index');

Route::get(
    '/store/ticket/upsert/{ticketId?}',
    'TicketController@upsert'
)->name('store_ticket_upsert');

Route::post(
    '/store/ticket/upsert/{ticketId?}',
    'TicketController@upsertPost'
)->name('store_ticket_upsert_post');


Route::get('/store/ticket/{ticketId?}',
 'TicketController@destroy'
 )->name('store_ticket_delete');

  // ======================== RawMaterial ====================

  Route::get(
    '/store/rawmaterial',
    'RawMaterialController@index'
)->name('store_rawmaterial_index');

Route::get(
    '/store/rawmaterial/upsert/{rawmaterialId?}',
    'RawMaterialController@upsert'
)->name('store_rawmaterial_upsert');

Route::post(
    '/store/rawmaterial/upsert/{rawmaterialId?}',
    'RawMaterialController@upsertPost'
)->name('store_rawmaterial_upsert_post');

Route::get(
    '/store/rawmaterial/profile/{rawmaterialId?}',
    'RawMaterialController@show'
)->name('store_rawmaterial_profile');


Route::get('/store/rawmaterial/{rawmaterialId?}',
 'RawMaterialController@destroy'
 )->name('store_rawmaterial_delete');
