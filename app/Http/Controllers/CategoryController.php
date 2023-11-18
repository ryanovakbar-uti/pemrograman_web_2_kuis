<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('blog.categories', [
            'title' => 'Blog Categories',
            'navbar' => 'categories',
            'header' => 'All Blog Categories',
            'categories' => Category::latest()->filter(request(['category']))->paginate()
        ]);
    }

    public function show(Category $category) {
        return view('blog.category', [
            'title' => 'Blog Category',
            'navbar' => 'categories',
            'header' => 'Blog Category',
            'name' => $category->name,
            'posts' => $category->posts()->paginate(3)
        ]);
    }
}