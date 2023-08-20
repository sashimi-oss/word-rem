<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

class CommentController extends Controller
{
    //
    public function store(Request $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/posts/' . $comment->post_id);
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/posts/' . $comment->post_id);
    }
}
