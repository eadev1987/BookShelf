<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PurchasesController;


Route::get('/', [BooksController::class, 'index']);
Route::post('/post', [PurchasesController::class, 'store']);
