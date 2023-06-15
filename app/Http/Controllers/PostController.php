<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts'
            , ['posts' => Post::latest()->filter()->paginate(3)]
        );
    }

    public function show(Post $post)
    {
        $post->with('comments.user')->get();
        return view('post', ['post' => $post]);
    }

//    public function getPosts() {
//        return Post::latest()->filter()->get();
//        $posts = Post::latest();
//        if (request('search')) {
//            $posts->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }
//        return $posts->get();
//    }
}
