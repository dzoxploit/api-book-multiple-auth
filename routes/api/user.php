<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/login',[LoginController::class, 'userLogin'])->name('userLogin');
Route::group( ['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[LoginController::class, 'userDashboard']);
    Route::apiResource('borrows', BorrowController::class);
});

// Public routes that don't require authentication
  Route::get('books',[BookController::class, 'index']);
  Route::get('books/{id}',[BookController::class, 'show']);
  Route::get('books/categories/{id}',[CategoriesController::class, 'show_books']);
  
  Route::get('categories',[CategoriesController::class, 'index']);
  Route::get('categories/{id}',[CategoriesController::class, 'show']);

  


