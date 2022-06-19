<?php
use Illuminate\Support\Facades\Route;



Route::view(
    '/',
    'admin.index'
)->name('store_index');

