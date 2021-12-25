<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function addPost()
    {
        $post = new Post();
        $post->title = "First Post Title";
        $post->body = "First Post Description";
        $post->save();
        return "Post has been created";
    }

    public function addComment($id)
    {
        $post = Post::find($id);

        $comment = new Comment();
        $comment->comment="Second Comment for Post $id"; // field comment

        // saving post_id        
        // Method 01 
        /* $comment->post_id = $id 
        $comment->save(); */       
        
        // Method 02 - inserting the post id and saving 
        $post->comments()->save($comment); // field post_id
        return "Comment has been posted";    
    }

    public function getCommentsByPost($postid)
    {
        $comments = Post::find($postid); // return only one comment
        $comments = Post::find($postid)->comments; // return all related comments
        return $comments;
    }
}
