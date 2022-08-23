<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PostEditController;

Route::get('/', [HomePageController::class, 'index'])->name('home');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Forgot
Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('password.forgot');
Route::post('/password/forgot', [ForgotPasswordController::class, 'store']);
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/password/reset/{token}', [ResetPasswordController::class, 'store']);

// logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Post
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostEditController::class, 'index'])->name('posts.edit');
Route::put('/posts/{post}/edit', [PostEditController::class, 'store']);


// Likes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

// Users
Route::get('/users/{user}', [UserController::class, 'index'])->name('users');
Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts');

// Profile 
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profile/edit', [ProfileEditController::class, 'index'])->name('profile.edit');
Route::post('/profile/edit', [ProfileEditController::class, 'store']);