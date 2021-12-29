<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/', [ArticleController::class, 'search'])->name('search');


Route::prefix("/dashboard")->middleware(["auth","admin"])->name("admin.")->group(function () {

    Route::get('/', [AdminController::class, 'index']);
    Route::get('/article/edit{id}', [AdminController::class, 'edit'])->name('article.edit');
    Route::post('/article/edit{id}', [AdminController::class, 'update'])->name('article.update');
    Route::post('/article/delete{id}', [AdminController::class, 'delete'])->name('article.delete');
    Route::get('/article/view{id}', [AdminController::class, 'view'])->name('article.view');
    Route::get('/article/create', [AdminController::class, 'create'])->name('article.create');
    Route::post('/article/create', [AdminController::class, 'store'])->name('article.store');
    Route::post('/article/view{id}', [AdminController::class, 'image'])->name('article.image');
});