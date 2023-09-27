<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'product'
], function () {
    Route::post('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/{id}', [ProductController::class, 'get'])->name('product.get');
});
