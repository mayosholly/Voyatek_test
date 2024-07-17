<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Post Model
 * 
 * This model represents the posts in the application. Each post belongs to a blog and can have multiple likes and comments.
 */
class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['blog_id', 'title', 'content', 'image_url'];

    /**
     * Get the blog that owns the post.
     *
     * This function defines a belongs-to relationship between the Post and Blog models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Get the likes for the post.
     *
     * This function defines a one-to-many relationship between the Post and Like models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the post.
     *
     * This function defines a one-to-many relationship between the Post and Comment models.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
