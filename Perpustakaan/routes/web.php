<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowsController;

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

Route::get('/', [WelcomeController::class, 'home']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/regist', [AuthController::class, 'regist']);
Route::get('/data-table', function() {
    return view('page.data-table');
});
Route::get('/table', function() {
    return view('page.table');
});

Route::middleware(['auth'])->group(function () {
    //CRUD
    //C => Create Data
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);

    //R => Read Data
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);

    //U => Update Data
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);

    //D => Delete Data
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    Route::post('/borrows/{books_id}', [BorrowsController::class, 'store']);
});


//CRUD Books
Route::resource('/books', BooksController::class);

Auth::routes();
