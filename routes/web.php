<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);

Route::get('books/search', [BookController::class, 'search'])->name('books.search');
