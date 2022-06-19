<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the votes for the post.
     */
    public function vote()
    {
        return $this->hasOne(Vote::class);
    }
}
