<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $meals = Meal::latest()->paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('home', [
            'meals' => $meals,
            'posts' => $posts,
        ]);
    }
}
