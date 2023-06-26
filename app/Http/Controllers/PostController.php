<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\Boardgamegeek;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(Boardgamegeek $boardgamegeek)
    {
        return view('posts', [
            'posts' => Post::latest()->filter(\request(['search', 'category', 'author']))
                ->withCount('comments')
                ->with('category')
                ->with('tags')
                ->with('author')
                ->paginate(10),
            'hotBgs' => $boardgamegeek->getHotItems()
            ]);
    }

    public function show(Post $post, Boardgamegeek $boardgamegeek)
    {
        $post
            ->with('comments.user')
            ->get();
        return view('post', [
            'post' => $post,
            'hotBgs' => $boardgamegeek->getHotItems()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'title' => ['required', 'max:255'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['main_image'] = fake()->imageUrl(1280, 720);
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/')->with('success', 'post successfully');
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
