<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

/**
 * BlogController
 * 
 * This controller handles the CRUD operations for the Blog model.
 */
class BlogController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the blogs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Paginate the blogs and return them as a collection of BlogResource
        $blogs = Blog::with(['posts'])->paginate();
        return $this->successResponse(BlogResource::collection($blogs), 'Blogs retrieved successfully');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBlogRequest $request)
    {
        // Create a new blog using the validated data from the request
        $blog = Blog::create($request->validated());
        return $this->successResponse(new BlogResource($blog), 'Blog added successfully', 201);
    }

    /**
     * Display the specified blog.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Blog $blog)
    {
        // Return the specified blog as a BlogResource
        return $this->successResponse(new BlogResource($blog->load(['posts'])), 'Blog retrieved successfully');
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // Update the specified blog using the validated data from the request
        $blog->update($request->validated());
        return $this->successResponse(new BlogResource($blog), 'Blog updated successfully');
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Blog $blog)
    {
        // Delete the specified blog
        $blog->delete();
        return $this->successResponse(null, 'Blog deleted successfully', 204);
    }
}
