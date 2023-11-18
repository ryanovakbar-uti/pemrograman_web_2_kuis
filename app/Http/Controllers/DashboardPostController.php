<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Dashboard',
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Dashboard',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'header' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|max:2048',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['post_wallpaper'] = $request->file('image')->store('post_wallpaper');
        }

        $validatedData['body'] = htmlspecialchars_decode($request->body);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($validatedData['body'], 100, '...');

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'title' => 'Dashboard',
            'navbar' => 'post',
            'header' => 'Blog Post',
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Dashboard',
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'header' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|max:2048',
            'body' => 'required',
        ];

        if ($post->slug != $request->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validated['post_wallpaper'] = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['post_wallpaper'] = $request->file('image')->store('post_wallpaper');
        }

        $validatedData['body'] = htmlspecialchars_decode($request->body);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($validatedData['body'], 100, '...');

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->post_wallpaper) {
            Storage::delete($post->post_wallpaper);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function dashboardPost()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}