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




Route::group([
    'as' => 'post.',         //Phan cua name route
    'prefix' => 'post',      //Duong dan
], function() {
    Route::get('/index',[PostController::class,'index']);
    Route::get('',[PostController::class,'index'])->name('index');
    Route::get('{post}',[PostController::class,'show'])->name('show');

    Route::get('/post1/create',[PostController::class,'create'])->name('create');
    Route::post('store',[PostController::class,'store']);

    Route::get('{post}/edit',[PostController::class,'edit'])->name('edit');
    Route::post('update/{post}',[PostController::class,'update'])->name('update');

    Route::get('destroy/{post}',[PostController::class,'destroy'])->name('destroy');
});