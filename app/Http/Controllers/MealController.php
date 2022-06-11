<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $meals = Meal::latest()->paginate(20);
        return view('meals.index', [
            'meals' => $meals
        ]);
    }

    public function show(Meal $meal)
    {
        return view('meals.show', [
            'meal' => $meal
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        // $request->user()->meals()->create($request->only('title', 'description', 'price', 'image_path'));

        $request->user()->meals()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $newImageName
        ]);

        return back();
    }

    public function destroy(Meal $meal)
    {
        $this->authorize('deleteMeal', $meal);

        $meal->delete();

        return back();
    }
}
