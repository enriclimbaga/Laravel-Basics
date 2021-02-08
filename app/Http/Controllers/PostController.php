<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);
        
        return view('posts.index', [
            'posts' => $posts,
            'message' => "sample"
        ]);
    }
    
    public function store(Request $request) 
    {
        $this->validate($request, [
            'body'=>'required'
        ]);
     
        $request->user()->posts()->create($request->only('body'));
        // auth()->user()->posts()->create();
        // Post::create([
            // 'user_id' =>auth()->id(),
            // 'body' => $request->body
        // ]);
        
        return back();
    }
    
    public function destroy(Post $post) 
    {   
        $this->authorize('delete', $post);
        $post->delete();
        
        return back();
    }
    
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
}
