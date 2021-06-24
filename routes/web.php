<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});




Route::group([
    'as' => 'post.',         //Phan cua name route
    'prefix' => 'post',      //Duong dan
], function () {
    Route::get('/index', [PostController::class, 'index']);
    Route::get('', [PostController::class, 'index'])->name('index');
    Route::get('{post}', [PostController::class, 'show'])->name('show');

    Route::get('/post1/create', [PostController::class, 'create'])->name('create');
    Route::post('store', [PostController::class, 'store']);

    Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::post('update/{post}', [PostController::class, 'update'])->name('update');

    Route::get('destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
});

Route::group(
    [
        'as' => 'news.',
        'prefix' => 'news',
    ],
    function () {

        Route::get('/index', [NewsController::class, 'index']);
        Route::get('', [NewsController::class, 'index'])->name('index');
        Route::get('/{news}/show', [NewsController::class, 'show'])->name('show');

        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('store', [NewsController::class, 'store']);

        Route::get('{news}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::post('update/{news}', [NewsController::class, 'update'])->name('update');

        Route::get('destroy/{news}', [NewsController::class, 'destroy'])->name('destroy');
    }

);

Route::group(
    [
        'as' => 'categories.',
        'prefix' => 'categories',
    ],
    function () {
        Route::get('/index', [CategoriesController::class, 'index']);
        Route::get('', [CategoriesController::class, 'index'])->name('index');
        Route::get('/{category}/show', [CategoriesController::class, 'show'])->name('show');

        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('store', [CategoriesController::class, 'store']);

        Route::get('{category}/edit', [CategoriesController::class, 'edit'])->name('edit');
        Route::post('update/{category}', [CategoriesController::class, 'update'])->name('update');

        Route::get('destroy/{category}', [CategoriesController::class, 'destroy'])->name('destroy');
        
        Route::get('/{category}/children',[CategoriesController::class,'children'])->name('children');
    }
);

Route::group(
    [
        'as' => 'product.',
        'prefix' => 'product',
    ],
    function () {
        Route::get('index', [ProductController::class, 'index']);
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('show/{product}', [ProductController::class, 'show'])->name('show');

        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');

        Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{product}', [ProductController::class, 'update'])->name('update');

        Route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');

        Route::post('destroy/all', [ProductController::class,'destroyAllProduct'])->name('destroyAllProduct');
    }
);
