<?php
use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'store.index'
)->name('store_index');

