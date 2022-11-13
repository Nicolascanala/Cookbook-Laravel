<?php

namespace App\Http\Controllers;

use App\Models\User;

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
