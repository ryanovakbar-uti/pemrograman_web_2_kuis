<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('blog.posts', [
            'title' => 'Blog Posts',
            'navbar' => 'posts',
            'header' => 'All Blog Posts',
            'posts' => Post::latest()->filter(request(['search', 'user', 'category']))->paginate(4)->withQueryString()
        ]);
    }
}