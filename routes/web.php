<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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


Route::get('/posts', [PostController::class, 'posts'])->name('post.list');

Route::post('/posts', [PostController::class, 'postCreate'])->name('post.create');

Route::post('/posts/{id}/edit', [PostController::class, 'postEdit'])->name('post.edit');

Route::get('/posts/{id}/edit', [PostController::class, 'postEditShow'])->name('post.edit-show');

Route::post('/posts/{id}/delete', [PostController::class, 'postDelete'])->name('post.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
