<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Comment Model
 * 
 * This model represents the comments for posts in the application. Each comment belongs to a post and a user.
 */
class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'user_id', 'comment'];

    /**
     * Get the post that the comment belongs to.
     *
     * This function defines a belongs-to relationship between the Comment and Post models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the user who made the comment.
     *
     * This function defines a belongs-to relationship between the Comment and User models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
