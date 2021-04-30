<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    PdfController
};

Route::middleware(['auth'])->group(function(){
    
    Route::any('/posts/search', [PostController::class,'search'])->name('posts.search');
    Route::put('/posts/{id}/eidtar', [PostController::class,'update'])->name('posts.update');
    Route::get('/posts/{id}/eidtar', [PostController::class,'edit'])->name('posts.edit');
    Route::delete('/posts/{id}/deletar', [PostController::class,'destroy'])->name('posts.delete');
    Route::post('/posts/novo', [PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{id}/detalhes', [PostController::class,'show'])->name('posts.show');
    Route::get('/posts/novo', [PostController::class,'create'])->name('posts.create');
    Route::get('/posts', [PostController::class,'index'])->name('posts.index');

    Route::get('/pdfs', [PdfController::class,'index'])->name('pdfs.index');
    Route::get('/pdfs/{id}/gerar-pdf', [PdfController::class,'todo'])->name('pdfs.todo');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
