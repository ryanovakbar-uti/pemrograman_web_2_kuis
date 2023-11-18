<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('blog.home', [
            'title' => 'Home',
            'navbar' => 'home',
            'header' => 'Home',
            'posts' => Post::where('user_id', auth()->user()->id ?? '')->paginate(4)
        ]);
    }
}