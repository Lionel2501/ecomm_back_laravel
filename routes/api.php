<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::post('addproduct', [ProductController::class, 'addproduct']);
Route::get('list', [ProductController::class, 'list']);
Route::get('product/{id}', [ProductController::class, 'getProduct']);
Route::put('update/{id}', [ProductController::class, 'updateProduct']);
Route::delete('delete/{id}', [ProductController::class, 'delete']);
Route::get('search/{search}', [ProductController::class, 'search']);
