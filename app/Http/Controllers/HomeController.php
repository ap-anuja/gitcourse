<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //access all the posts with all() and store it in $posts
        $posts = Post::all();
        //  dd($posts);
        // return the view and associate the value of $posts to 'posts' to access in blade file
        return view('home', ['posts'=>$posts]);
    }
}
