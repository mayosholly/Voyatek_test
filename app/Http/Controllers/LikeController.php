<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikeResource;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

/**
 * LikeController
 * 
 * This controller handles adding likes to posts.
 */
class LikeController extends Controller
{
    use ApiResponse;

    /**
     * Handle the incoming request to add a like to a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $post_id)
    {
        // The seeded user has a user id of 1.
        $user_id = 1;

        // Create a new like for the post
        $like = Like::create([
            'post_id' => $post_id,
            'user_id' => $user_id,
        ]);

        // Return a success response with the created like as a resource
        return $this->successResponse(new LikeResource($like), 'Like added successfully', 201);
    }
}
