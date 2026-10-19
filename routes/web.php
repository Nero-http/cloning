<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookGenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorProfileController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::resources([
        'authors' => AuthorController::class,
        'publishers' => PublisherController::class,
        'books' => BookController::class,
        'book-genres' => BookGenreController::class,
        'reviews' => ReviewController::class,
        'suppliers' => SupplierController::class,
        'warehouses' => WarehouseController::class,
        'managers' => ManagerController::class,
        'genres' => GenreController::class,
        'products' => ProductController::class,
        'author-profiles' => AuthorProfileController::class,
    ]);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';