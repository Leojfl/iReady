<?php
use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'store.index'
)->name('store_index');
// ======================== Providers ====================

Route::get(
    '/providers',
    'ProviderController@index'
)->name('store_provider_index');

Route::get(
    '/provider/upsert/{providerId?}',
    'ProviderController@upsert'
)->name('store_provider_upsert');

Route::post(
    '/provider/upsert/{providerId?}',
    'ProviderController@upsertPost'
)->name('store_provider_upsert_post');

Route::get(
    '/shopping/provider/{providerId?}',
    'ProviderController@upsertPost'
)->name('store_shopping_provider');

// ================== Shopping index ====================

Route::get(
    '/shopping',
    'ShoppingController@index'
)->name('store_shopping_index');





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
    '/material',
    'RawMaterialController@index'
)->name('store_raw_material_index');

Route::get(
    '/material/upsert/{rawMaterialId?}',
    'RawMaterialController@upsert'
)->name('store_raw_material_upsert');

Route::post(
    '/material/upsert/{rawMaterialId?}',
    'RawMaterialController@upsertPost'
)->name('store_raw_material_upsert_post');

Route::get(
    '/material/show/{rawMaterialId?}',
    'RawMaterialController@show'
)->name('store_raw_material_show');
