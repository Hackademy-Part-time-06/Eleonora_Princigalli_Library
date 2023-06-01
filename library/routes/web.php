<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Pagecontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [Pagecontroller::class, 'index'])->name('books.index');
Route::get('/send', [Pagecontroller::class, 'create'])->name('books.form');
Route::post('/store', [Pagecontroller::class, 'store'])->name('books.store');
Route::get('/libri/{book}/details', [Pagecontroller::class, 'show'])->name('books.show');

Route::get('/homecategory', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categoria/{category}/details', [CategoryController::class, 'show'])->name('categories.show');





