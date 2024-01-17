<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ArticleController;

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

Route::get('posts', [PostController::class, 'index']);
Route::get('recent-articles', [PostController::class, 'recentArticles']);
Route::get('hero-featured-posts', [PostController::class, 'featurePostHero']);
Route::get('all-featured-posts', [PostController::class, 'getAllFeaturedPosts']);
Route::get('categories', [CategoryController::class, 'getCategories']);
Route::get('category-posts/{id}', [CategoryController::class, 'categoryView']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::get('entries', [ContentController::class, 'entries']);
Route::get('single-entry/{id}', [ContentController::class, 'singleEntry']);
