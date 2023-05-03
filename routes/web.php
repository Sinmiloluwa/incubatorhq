<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PostController as UserPostController;

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
Route::group(['middleware' => 'auth', 'prefix' => 'the-universe'], function(){
    Route::get('/', [Controller::class, 'index'])->name('home');
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('create-new-posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('drafts', [PostController::class, 'drafts'])->name('posts.draft');
    Route::post('update-draft/{post}', [PostController::class, 'updateDraft'])->name('update.draft');
    Route::get('recently-deleted-posts', [PostController::class, 'recentlyDeleted'])->name('posts.deleted');
    Route::post('restore-deleted/{post}', [PostController::class, 'restoreDeleted'])->name('post.restore');
    Route::post('upload', [PostController::class, 'upload'])->name('image.upload');
    Route::get('create-post', [PostController::class, 'create'])->name('posts.create');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('revoke-user/{user}', [UserController::class, 'revokeUser'])->name('user.revoke');
});
Route::post('save-to-draft', [PostController::class, 'draft'])->name('post.draft');
Route::get('signup', [AuthController::class, 'index'])->name('admin.signup');
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signin', [AuthController::class, 'login'])->name('admin.login');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');

Auth::routes();

