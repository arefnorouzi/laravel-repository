<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\PostApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'middleware' => ['XssProtector']], function (){
    //api routes
    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class
    ]);

    Route::get('/posts', [PostApiController::class, 'posts'])->name('recent-posts');

});

