<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\SearchController;

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');

Route::get('/categories/{slug}', [CatalogController::class, 'show'])->name('categories.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');
