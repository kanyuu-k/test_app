<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->get();
        $user=auth()->user();
        return view('home', compact('posts','user'));
    }

    public faunction mypost(){
        $user = auth()->user()->id;
        $posts = Post::where('user_id', $user)->get();
        return view('mypost', compact('posts'));
    }
}

