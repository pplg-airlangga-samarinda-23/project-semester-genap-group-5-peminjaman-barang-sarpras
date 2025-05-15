<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('homepage');
});


Route::get('/pinjaman',function(){
    return view('peminjaman');
}); 

Route::get('/pengembalian',function(){
    return view('peminjaman');
});


// ignore under this =======================================

// Route::get('/posts', [PostController::class, 'index']); // Index
// Route::get('/posts/create', [PostController::class, 'create']); // Create form
// Route::post('/posts', [PostController::class, 'store']); // Store new post
// Route::get('/posts/{post}', [PostController::class, 'show']); // Show single post
// Route::get('/posts/{post}/edit', [PostController::class, 'edit']); // Edit form
// Route::put('/posts/{post}', [PostController::class, 'update']); // Update post
// Route::delete('/posts/{post}', [PostController::class, 'destroy']); // Delete post