<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BooksController::class, 'index']);
Route::get('/book/{id}', [BooksController::class, 'bookDetail']);
Route::post('/create-book', [BooksController::class, 'store']);
Route::delete('/delete-book/{id}', [BooksController::class, 'destroy']);
Route::put('/change-book/{id}', [BooksController::class, 'update']);
Route::post('/checkout/{id}', [CheckoutController::class, 'checkout']);
