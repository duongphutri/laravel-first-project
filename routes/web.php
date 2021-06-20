<?php

use App\Http\Controllers\PostController;
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

Route::get('/posts',[PostController::class,'index']);
Route::get('/post/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/post1/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/store',[PostController::class,'store']);

Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::post('/post/update/{post}',[PostController::class,'update'])->name('post.update');