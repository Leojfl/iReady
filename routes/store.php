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

Route::get(
    '/shopping/upsert/{providerMaterialId?}',
    'ShoppingController@upsert'
)->name('store_shopping_upsert');

Route::post(
    '/shopping/upsert/{providerMaterialId?}',
    'ShoppingController@upsertPost'
)->name('store_shopping_upsert_post');

Route::get(
    '/shopping/show/{providerMaterialId?}',
    'ShoppingController@show'
)->name('store_shopping_show');

// ======================== Orders ====================
Route::get(
    '/orders/place',
    'OrderController@indexPlace'
)->name('store_order_place_index');

Route::get(
    '/orders/online',
    'OrderController@indexOnline'
)->name('store_order_online_index');

Route::get(
    '/orders/all',
    'OrderController@indexAll'
)->name('store_order_all_index');

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

Route::get('/store/board/show/map',
'BoardController@map'
)->name('store_board_map');

Route::post('/store/board/update/map',
'BoardController@update'
)->name('store_board_map_update');

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

///////////// Employee /////////////////////////////

Route::get(
    '/employee',
    'EmployeeController@index'
)->name('store_employee_index');

Route::get('/employee/upsert/{id?}',
'EmployeeController@create'
)->name('store_employee_upsert');

Route::get('/employee/show/{id?}',
    'EmployeeController@show'
)->name('store_employee_show');

Route::post('/employee/update/{id?}', 'EmployeeController@update'
)->name('store_employee_update');

Route::get('/employee/delete/{id}', 'EmployeeController@destroy'
)->name('store_employee_delete');

Route::resource('employees', App\Http\Controllers\Store\AuthorController::class);

 // ======================== Menu ====================

Route::get(
    '/menu',
    'MenuController@index'
)->name('store_menus_index');

Route::get(
    '/menu/upsert/{menuId?}',
    'MenuController@upsert'
)->name('store_menu_upsert');


Route::post(
    '/menu/upsert/{productId?}',
    'MenuController@upsertPost'
)->name('store_menu_upsert_post');

Route::get(
    '/menu/upsert/status/{menuId?}',
    'MenuController@upsertStatus'
)->name('store_menu_upsert_status');

Route::get(
    '/menu/show/{menuId?}',
    'MenuController@show'
)->name('store_menu_show');
