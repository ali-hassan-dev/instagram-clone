<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;

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


Auth::routes();

Route::get('/', [PostController::class, 'index']);
Route::post('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profiles.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update']);

Route::post('/follow/{user}', [FollowController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
