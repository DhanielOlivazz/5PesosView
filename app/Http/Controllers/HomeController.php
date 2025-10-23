<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); // últimos posts
        $destacados = Post::latest()->take(5)->get(); // posts destacados

        return view('home', compact('posts', 'destacados'));
    }
}
