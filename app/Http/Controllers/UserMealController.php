<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserMealController extends Controller
{
    public function index(User $user)
    {
        $meals = $user->meals()->with(['user'])->paginate(20);

        return view('users.meals.index', [
            'user' => $user,
            'meals' => $meals
        ]);
    }
}
