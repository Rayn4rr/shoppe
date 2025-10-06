<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[RegisterController::class,'register'])->name('register');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/un-logged-in',[LoginController::class,'unLoggedIn'])->name('un-logged-in');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::post('/products', [ProductController::class,'store']);
Route::put('/products/{id}', [ProductController::class,'update']);
Route::delete('/products/{id}', [ProductController::class,'destroy']);

Route::post('/logout',[LogOutController::class,'logout']);

});
