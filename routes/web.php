<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('welcome', [Controller::class, 'index'])->name('home');
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('create-new-posts', [PostController::class, 'store'])->name('posts.store');
});

Route::get('create-post', [PostController::class, 'create'])->name('posts.create');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('save-to-draft', [PostController::class, 'draft'])->name('post.draft');
Route::get('register', [AuthController::class, 'index'])->name('register');
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
