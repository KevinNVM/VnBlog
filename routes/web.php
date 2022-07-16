<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TrixController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'posts' => Post::latest()->get(),
        'categories' => Category::all()]
    );
})->name('home');

Route::get('/about', function() {
    return view('about', [
        'title' => 'About Page',
        'name' => 'Kevin Darmawan',
        'email' => 'kevindarmawan022@gmail.com'
    ]);
});

Route::resource('/profile', UserController::class)->except(['show', 'create', 'store'])->middleware('auth');

# Posts Route

Route::get('/{posts}', [PostController::class, 'index'])->where('posts', '(posts|blog|postingan)');


Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [PostController::class, 'categoryList']);

Route::get('/categories/{category:slug}', [PostController::class, 'categoryPosts']);

Route::get('/author/{author:UUID}', [PostController::class, 'authorDetail']);

Route::get('/author/posts/{author:UUID}', [PostController::class, 'authorPosts']);

Route::get('/dashboard', function (Post $post) {
    return view('dashboard.home', [
        'posts' => $post->where('user_id', auth()->user()->id)->get()
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


# Utilities

Route::get('/utilities/getslug', [DashboardPostController::class, 'getSlug']);
Route::get('/utilities/blog_header', function () {
    return view('partials.blog_header', [
        'posts' => Post::all(),
        'categories' => Category::all(),
    ]);
});
Route::get('/utilities/trix', [TrixController::class, 'index']);
Route::post('/utilities/trix/upload', [TrixController::class, 'upload']);
Route::post('/utilities/trix', [TrixController::class, 'store']);