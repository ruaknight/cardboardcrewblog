<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/categories/{category:name}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});

Route::get('/tags/{tag:name}', function (Tag $tag) {
    return view('posts', ['posts' => $tag->posts]);
});

Route::get('/authors/{author:name}', function (User $author) {
    return view('posts', ['posts' => $author->posts]);
});

Route::get('/post/{post:title}', [PostController::class, 'show']);


