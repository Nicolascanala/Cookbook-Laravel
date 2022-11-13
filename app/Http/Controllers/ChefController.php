<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ChefController extends Controller
{
    public function index()
    {
        return view('auth.chef');
    }

    public function store(Request $request)
    {
        // Validation
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'motivation' => 'required|max:255',
        // ]);

        $user = User::where('id', auth()->user()->id)->get();
        $chefRole = Role::where('name', 'chef')->first();
        // dd($chefRole);

        $user->first()->assignRole($chefRole);

        return redirect()->route('meals');
    }
}
