<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Web\SectionController as WebController;
use App\Http\Controllers\Admin\SectionController as AdminController;

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

// Route::redirect('/', 'login', 301)->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::redirect('/', 'admin/dashboard', 301)->name('admin');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.index');
        Route::get('categories', [AdminController::class, 'categories'])->name('admin.categories.index');
        Route::get('posts', [AdminController::class, 'posts'])->name('admin.posts.index');
        Route::resource('post', PostController::class);
        Route::get('organizations', [AdminController::class, 'organizations'])->name('admin.organizations.index');
        Route::get('lawyers', [AdminController::class, 'lawyers'])->name('admin.lawyers.index');
        Route::resource('lawyer', LawyerController::class);
    });
});

Route::get('/', [WebController::class, 'home'])->name('home.index');
Route::get('/about', [WebController::class, 'about'])->name('about.index');
Route::get('/organs', [WebController::class, 'organs'])->name('organs.index');
Route::get('/{category:slug}', [WebController::class, 'getCategoryPosts'])->name('category.posts.get');
Route::get('/{category:slug}/{post:slug}', [WebController::class, 'postDetail'])->name('post.detail');
