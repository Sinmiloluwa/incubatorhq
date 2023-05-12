<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostPreviewController;
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
    Route::get('category', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categor/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
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
    Route::get('create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('revoke-user/{user}', [UserController::class, 'revokeUser'])->name('user.revoke');
    Route::get('preview/{post}', [PostController::class, 'preview'])->name('display');
    Route::post('preview', [PostPreviewController::class, 'store'])->name('post.preview');
    Route::get('publish/{post}', [PostController::class, 'publish'])->name('post.publish');
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('detach/{user}', [RoleController::class, 'detachUser'])->name('user.detach');
    Route::post('attach/{role}', [RoleController::class, 'attachUser'])->name('user.attach');
});
Route::post('save-to-draft', [PostController::class, 'draft'])->name('post.draft');
Route::get('signup', [AuthController::class, 'index'])->name('admin.signup');
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signin', [AuthController::class, 'login'])->name('admin.login');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');

Auth::routes();

