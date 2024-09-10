<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\post;
use Illuminate\Support\Facades\Route;


// Route::view('/', 'User.home');


Route::get('/', function (post $post) {
    // $posts = Post::all();

    $posts = Post::paginate(7);
    return view('User.home', compact('posts'));
})->name('home');


// session
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destory']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/post/{slug}', [PostController::class, 'show'])->name('show_post');
Route::get('/post/{slug}/edit', [PostController::class, 'edit']);
Route::patch('/post/{slug}', [PostController::class, 'update']);
Route::delete('/post/{slug}', [PostController::class, 'destory']);
Route::post('/comment/post/{slug}', [CommentController::class, 'store']);

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [PostController::class, 'index']);
    Route::post('/adimn/post', [PostController::class, 'store']);
});


// Route::view('/admin', 'Admin.index')->middleware('admin');
