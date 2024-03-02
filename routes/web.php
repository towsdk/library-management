<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);


route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/category_page', [AdminController::class, 'category_page'])->name('category_page');
route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');
route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
route::get('/update_category/{id}', [AdminController::class, 'update_category'])->name('update_category');
route::post('/edit_categories/{id}', [AdminController::class, 'edit_categories'])->name('edit_categories');
route::get('/add_books', [AdminController::class, 'add_books'])->name('add_books');
route::post('/store_book', [AdminController::class, 'store_book'])->name('store_book');
route::get('/showBooks', [AdminController::class, 'showBooks'])->name('showBooks');
route::get('/delete_book/{id}', [AdminController::class, 'delete_book'])->name('delete_book');
route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->name('edit_book');
route::post('/update_book/{id}', [AdminController::class, 'update_book'])->name('update_book');
route::get('/book_details/{id}', [HomeController::class, 'book_details'])->name('book_details');
route::get('/borrow_books/{id}', [HomeController::class, 'borrow_books'])->name('borrow_books');
route::get('/borrow_request', [AdminController::class, 'borrow_request'])->name('borrow_request')
->middleware(['auth', 'admin']);
route::get('/approved_book/{id}', [AdminController::class, 'approved_book'])->name('approved_book');
route::get('/returned/{id}', [AdminController::class, 'returned'])->name('returned');
route::get('/rejected/{id}', [AdminController::class, 'rejected'])->name('rejected');
route::get('/book_history', [HomeController::class, 'book_history'])->name('book_history');
route::get('/cancel_req/{id}', [HomeController::class, 'cancel_req'])->name('cancel_req');
route::get('/explore', [HomeController::class, 'explore'])->name('explore');
route::get('/search', [HomeController::class, 'search'])->name('search');
route::get('/cat_search/{id}', [HomeController::class, 'cat_search'])->name('cat_search');