<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::published()->paginate(9),
        ]);
    }

    public function show(Post $post): View
    {
        abort_if($post->published_at === null || $post->published_at->isFuture(), 404);

        return view('blog.show', [
            'post' => $post,
            'recent' => Post::published()->where('id', '!=', $post->id)->take(3)->get(),
        ]);
    }
}
