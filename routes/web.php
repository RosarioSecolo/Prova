<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class,'homepage'])->name('homepage');

Route::get('/article/index',[ArticleController::class,'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class,'show'])->name('article.show');
Route::get('/article/category/{category}',[ArticleController::class,'byCategory'])->name('article.byCategory');
Route::get('/article/writer/{user}',[ArticleController::class,'byWriter'])->name('article.byWriter');
Route::get('/careers',[PublicController::class,'careers'])->name('careers');
Route::post('/careers/submit',[PublicController::class,'careersSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::patch('/admin/{user}/set-admin',[AdminController::class,'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor',[AdminController::class,'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer',[AdminController::class,'setWriter'])->name('admin.setWriter');
});

Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard',[RevisorController::class,'dashboard'])->name('revisor.dashboard');

    Route::post('/revisor/{user}/accept',[RevisorController::class,'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/{user}/reject',[RevisorController::class,'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/{user}/undo',[RevisorController::class,'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function(){
    Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');
    Route::post('/article/store',[ArticleController::class,'store'])->name('article.store');

}