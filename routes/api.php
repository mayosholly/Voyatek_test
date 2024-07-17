<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
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

// Define a route group that applies the 'token' middleware to all included routes
Route::middleware('token')->group(function () {

    /**
     * Define API resource routes for the BlogController
     * This will automatically create routes for index, store, show, update, and destroy methods
     */
    Route::apiResource('blogs', BlogController::class);

    /**
     * Define routes for managing posts under a specific blog
     */
    // Fetch all posts under a specific blog
    Route::get('blogs/{blog_id}/posts', [PostController::class, 'index']);

    // Create a new post under a specific blog
    Route::post('blogs/{blog_id}/posts', [PostController::class, 'store']);

    // Fetch details of a specific post under a specific blog
    Route::get('blogs/{blog_id}/posts/{id}', [PostController::class, 'show']);

    // Update a specific post under a specific blog
    Route::put('blogs/{blog_id}/posts/{id}', [PostController::class, 'update']);

    // Delete a specific post under a specific blog
    Route::delete('blogs/{blog_id}/posts/{id}', [PostController::class, 'destroy']);

    /**
     * Define routes for managing likes on posts
     */
    // Like a specific post
    Route::post('posts/{post_id}/likes', LikeController::class);

    /**
     * Define routes for managing comments on posts
     */
    // Add a comment to a specific post
    Route::post('posts/{post_id}/comments', CommentController::class);

});
