<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

/**
 * PostController
 * 
 * This controller handles the CRUD operations for the Post model.
 */
class PostController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the posts for a specific blog.
     *
     * @param  int  $blog_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($blog_id)
    {
        // Retrieve posts with likes and comments for a specific blog
        $posts = Post::with(['likes', 'comments'])->where('blog_id', $blog_id)->paginate();
        return $this->successResponse(PostResource::collection($posts), 'Posts retrieved successfully');
    }

    /**
     * Store a newly created post for a specific blog.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @param  int  $blog_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request, $blog_id)
    {
        // Create a new post with validated data for a specific blog
        $post = Post::create([
            'blog_id' => $blog_id,
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $request->image_url,
        ]);
        return $this->successResponse(new PostResource($post), 'Post added successfully', 201);
    }

    /**
     * Display the specified post for a specific blog.
     *
     * @param  int  $blog_id
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($blog_id, $id)
    {
        // Retrieve a specific post with likes and comments for a specific blog
        $post = Post::with(['likes', 'comments'])->where('blog_id', $blog_id)->findOrFail($id);
        return $this->successResponse(new PostResource($post), 'Post retrieved successfully');
    }

    /**
     * Update the specified post for a specific blog in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  int  $blog_id
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePostRequest $request, $blog_id, $id)
    {
        // Update the specified post with validated data for a specific blog
        $post = Post::where('blog_id', $blog_id)->findOrFail($id);
        $post->update($request->all());
        return $this->successResponse(new PostResource($post), 'Post updated successfully');
    }

    /**
     * Remove the specified post from storage for a specific blog.
     *
     * @param  int  $blog_id
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($blog_id, $id)
    {
        // Delete the specified post for a specific blog
        Post::where('blog_id', $blog_id)->destroy($id);
        return $this->successResponse(null, 'Post deleted successfully', 204);
    }
}
