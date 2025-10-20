<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class GetPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }
}
