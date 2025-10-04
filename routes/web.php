<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/impressum', 'impressum');
Route::get('/kategoriler/{category:slug}', [\Firefly\FilamentBlog\Http\Controllers\CategoryController::class, 'posts'])->name('filamentblog.category.post');
Route::get('/etiketler/{tag:slug}', [\Firefly\FilamentBlog\Http\Controllers\TagController::class, 'posts'])->name('filamentblog.tag.post');
Route::get('/tum-icerikler', [\Firefly\FilamentBlog\Http\Controllers\PostController::class, 'allPosts'])->name('filamentblog.post.all');
Route::get('/ara', [\Firefly\FilamentBlog\Http\Controllers\PostController::class, 'search'])->name('filamentblog.post.search');
Route::post('/blog/{post:slug}/yorum', [\Firefly\FilamentBlog\Http\Controllers\CommentController::class, 'store'])->middleware('auth')->name('filamentblog.comment.store');


Route::prefix('etkinlikler')->group(function () {
    Route::get('/', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::get('/{slug}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');
});

