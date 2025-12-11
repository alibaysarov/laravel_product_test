<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test",  [ExampleController::class, 'hello']);

Route::group(['prefix' => 'v1'], function () {
  Route::prefix('products')->group(function () {
    Route::controller(ProductController::class)->group(function () {
      Route::get('/', 'list');
    });
  });
});

