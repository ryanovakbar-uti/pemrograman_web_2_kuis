<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user) {
        return view('blog.user', [
            'title' => 'User Post',
            'navbar' => 'posts',
            'header' => 'User Post',
            'name' => $user->name,
            'posts' => $user->posts()->paginate(3)
            // 'posts' => $user->posts->load('user', 'category')
        ]);
    }
}