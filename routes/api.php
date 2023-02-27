<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('product')->name('product.')->group(function(){
    Route::get('/', [ProductController::class,'index'])->name('index');
    Route::get('/create', [ProductController::class,'create'])->name('create');
    Route::post('/store', [ProductController::class,'store'])->name('store');
    Route::get('/show/{id}', [ProductController::class,'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
    Route::put('/update/{id}', [ProductController::class,'update'])->name('update');
    Route::get('/destroy/{id}', [ProductController::class,'destroy'])->name('destroy');
});