<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\SetLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('language/{locale}', function (Request $request, $locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    // Встановіть кукі з вибраною мовою
    return response()->json(['message' => 111])->cookie('locale', $locale, 60 * 24 * 30); // Кукі встановлюється на 30 днів
});

Route::middleware([SetLanguage::class])->group(function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostsController::class, 'list']);
        Route::get('/{slug}', [PostsController::class, 'show']);
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServicesController::class, 'list']);
        Route::get('/{slug}', [ServicesController::class, 'show']);
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectsController::class, 'list']);
        Route::get('/{slug}', [ProjectsController::class, 'show']);
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class, 'list']);
//    Route::get('/{slug}', [ProjectsController::class, 'show']);
    });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});
