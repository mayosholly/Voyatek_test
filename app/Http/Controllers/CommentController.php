<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

/**
 * CommentController
 * 
 * This controller handles adding comments to posts.
 */
class CommentController extends Controller
{
    use ApiResponse;

    /**
     * Handle the incoming request to add a comment to a post.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @param  int  $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(StoreCommentRequest $request, $post_id)
    {
        // The seeded user has a user id of 1.
        $user_id = 1;

        // Create a new comment for the post
        $comment = Comment::create([
            'post_id' => $post_id,
            'user_id' => $user_id,
            'comment' => $request->comment,
        ]);

        // Return a success response with the created comment as a resource
        return $this->successResponse(new CommentResource($comment), 'Comment added successfully', 201);
    }
}
