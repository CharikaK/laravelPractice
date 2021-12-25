<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    // singular
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
