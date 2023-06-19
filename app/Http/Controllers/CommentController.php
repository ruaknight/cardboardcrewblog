<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store() {

        $attributes = request()->validate([
            'comment' => ['required']
        ]);

        $attributes['post_id'] = \request()->input('post_id');
        $attributes['user_id'] = auth()->id();

        Comment::create($attributes);
        session()->flash('success', 'comment created');

        return redirect()->back();
    }
}
