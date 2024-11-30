<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;


Route::resource('items', ItemSaleController::class);

Route::resource('items', ItemSaleController::class);

Route::get('/', function () {
    return view('welcome');
});
