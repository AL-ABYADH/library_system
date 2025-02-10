<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect()->route('books.index');
});
Route::get('books/search', [BookController::class, 'search'])->name('books.search');

Route::resource('books', BookController::class);


