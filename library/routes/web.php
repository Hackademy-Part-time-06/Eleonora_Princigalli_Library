<?php

use App\Http\Controllers\AuthorController;
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

//CRUD di Book

Route::get('/', [Pagecontroller::class, 'index'])->name('books.index');
Route::get('/send', [Pagecontroller::class, 'create'])->name('books.form');
Route::post('/store', [Pagecontroller::class, 'store'])->name('books.store');
Route::get('/libri/{book}/details', [Pagecontroller::class, 'show'])->name('books.show');
Route::get('/libri/{book}/modifica', [Pagecontroller::class, 'edit'])->name('books.edit');
Route::put('/libri/{book}', [Pagecontroller::class, 'update'])->name('books.update');
Route::delete('/libri/{book}', [Pagecontroller::class, 'destroy'])->name('books.destroy');



//CRUD di Category

Route::get('/homecategory', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/salva', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categoria/{category}/details', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/libri/{category}/modifica', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/libri/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/libri/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//Route::resource('URI', 'Controller')

Route::resource('authors', AuthorController::class);


