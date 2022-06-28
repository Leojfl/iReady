<?php
use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'store.index'
)->name('store_index');


////////////// rutas RawMaterial//////////////////
Route::get('/materia', 'Admin\RawMaterialController@index')->name('raw_material_index');
Route::get('/materia/create', 'Admin\RawMaterialController@create')->name('raw_material_create');
Route::post('/materia/store', 'Admin\RawMaterialController@store')->name('raw_material_store');
Route::get('/materia/edit/{id}', 'Admin\RawMaterialController@edit')->name('raw_material_edit');
Route::post('/materia/update/{id}', 'Admin\RawMaterialController@update')->name('raw_material_update');
Route::delete('/materia/delete/{id}', 'Admin\RawMaterialController@destroy')->name('raw_material_delete');
