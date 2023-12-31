<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    
    
    public function index(Post $post){
        //return view('posts.index')->with(['posts' => $post->get()]);
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        // $postdayo = Post::where('id', $post->id)->first();
        // $comment = Comment::where('post_id','1')->find(3);
        $comment = $post->comments()->get();
        return view('posts.show')->with(['post' => $post, 'comment' => $comment]);
    }
    
    public function create(Post $post){
        return view('posts.create')->with(['post' => $post]);
    }
    
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

}
