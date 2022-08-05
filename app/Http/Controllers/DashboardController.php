<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index()
    {
        $meals = Meal::latest()->paginate(20);
        $posts = Post::latest()->paginate(20);

        return view('dashboard', [
            'meals' => $meals,
            'posts' => $posts
        ]);
    }
}
