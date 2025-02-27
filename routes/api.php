<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/auto_login', [AuthController::class, 'usereDetails'])->middleware('auth:sanctum');


Route::group([
    'prefix' => 'products',
    'middleware' => ['auth:sanctum', 'checkUserType:Admin'],
], function () {
    Route::get('/', [ProductController::class, 'getAllProducts']); // List all products
    Route::post('/', [ProductController::class, 'store']); // Create a new product
    Route::put('{product}', [ProductController::class, 'update']); // Update a product
    Route::delete('{product}', [ProductController::class, 'delete']); // Delete a product
});

Route::group([
    'prefix' => 'products',
], function () {
    Route::get('{product}', [ProductController::class, 'productDetails']); // Show a single product
    Route::get('/public/list', [ProductController::class, 'getAllProductsPublic']); // Show a single product
});


Route::post('/upload', [FileUploadController::class, 'upload']);

