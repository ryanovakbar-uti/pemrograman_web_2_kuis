<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index() {
        return view('blog.about', [
            'title' => 'About',
            'navbar' => 'about',
            'user' => User::where('id', auth()->user()->id ?? '')->get()
        ]);
    }

    public function update(Request $request, User $user) {
        $rules = [
            'image' => 'required|image|max:2048'
        ];

        $validated['profile_wallpaper'] = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['profile_wallpaper'] = $request->file('image')->store('profile_wallpaper');
        }

        User::where('id', $user->id)->update($validated);

        return redirect('/about')->with('success', 'Profile Wallpaper has been updated!');
    }
}