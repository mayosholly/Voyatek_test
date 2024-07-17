<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Like Model
 * 
 * This model represents the likes for posts in the application. Each like belongs to a post and a user.
 */
class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'user_id'];

    /**
     * Get the post that the like belongs to.
     *
     * This function defines a belongs-to relationship between the Like and Post models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the user who made the like.
     *
     * This function defines a belongs-to relationship between the Like and User models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
