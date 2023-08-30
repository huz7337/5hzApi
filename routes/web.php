<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');

        Route::post('/', [UsersController::class, 'store'])->name('users.store');
        Route::put('{user}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [RolesController::class, 'create'])->name('roles.create');
        Route::get('/edit/{role}', [RolesController::class, 'edit'])->name('roles.edit');

        Route::post('/', [RolesController::class, 'store'])->name('roles.store');
        Route::put('{role}', [RolesController::class, 'update'])->name('roles.update');
        Route::delete('{role}', [UsersController::class, 'destroy'])->name('roles.destroy');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostsController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
        Route::get('/edit/{post}', [PostsController::class, 'edit'])->name('posts.edit');

        Route::post('/', [PostsController::class, 'store'])->name('posts.store');
        Route::put('{post}', [PostsController::class, 'update'])->name('posts.update');
        Route::delete('{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServicesController::class, 'index'])->name('services.index');
        Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
        Route::get('/edit/{service}', [ServicesController::class, 'edit'])->name('services.edit');

        Route::post('/', [ServicesController::class, 'store'])->name('services.store');
        Route::put('{service}', [ServicesController::class, 'update'])->name('services.update');
        Route::delete('{service}', [ServicesController::class, 'destroy'])->name('services.destroy');
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
        Route::get('/edit/{project}', [ProjectsController::class, 'edit'])->name('projects.edit');

        Route::post('/', [ProjectsController::class, 'store'])->name('projects.store');
        Route::put('{project}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::delete('{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::get('/edit/{category}', [CategoriesController::class, 'edit'])->name('categories.edit');

        Route::post('/', [CategoriesController::class, 'store'])->name('categories.store');
        Route::put('{category}', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    });

    Route::group(['prefix' => 'positions'], function () {
        Route::get('/', [PositionsController::class, 'index'])->name('positions.index');
        Route::get('/create', [PositionsController::class, 'create'])->name('positions.create');
        Route::get('/edit/{position}', [PositionsController::class, 'edit'])->name('positions.edit');

        Route::post('/', [PositionsController::class, 'store'])->name('positions.store');
        Route::put('{position}', [PositionsController::class, 'update'])->name('positions.update');
        Route::delete('{position}', [PositionsController::class, 'destroy'])->name('positions.destroy');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', [CommentsController::class, 'index'])->name('comments.index');
        Route::get('/create', [CommentsController::class, 'create'])->name('comments.create');
        Route::get('/edit/{comment}', [CommentsController::class, 'edit'])->name('comments.edit');

        Route::post('/', [CommentsController::class, 'store'])->name('comments.store');
        Route::put('{comment}', [CommentsController::class, 'update'])->name('comments.update');
        Route::delete('{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagsController::class, 'index'])->name('tags.index');
        Route::get('/create', [TagsController::class, 'create'])->name('tags.create');
        Route::get('/edit/{tag}', [TagsController::class, 'edit'])->name('tags.edit');

        Route::post('/', [TagsController::class, 'store'])->name('tags.store');
        Route::put('{tag}', [TagsController::class, 'update'])->name('tags.update');
        Route::delete('{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');
    });

    Route::group(['prefix' => 'attachments'], function () {
        Route::delete('/{attachment}', [AttachmentController::class, 'destroy'])->name('attachments.destroy');
    });
});
