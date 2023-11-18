<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('blog.register.index', [
            'title' => 'Register',
            'navbar' => 'register'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:32|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4'
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successful, now you can login.');
        return redirect('login')->with('success', 'Registration successful, now you can login.');
    }
}