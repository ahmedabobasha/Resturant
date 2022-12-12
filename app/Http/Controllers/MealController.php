<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MealController extends Controller
{
    public function index()
    {
    $meals= Meal::all();
    return view('meal.index',compact('meals'));
    }
    public function create()
    {
       $cat_name=category::all();
        return view('meal.mealcreate',compact('cat_name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3',
            'description'=>'required|min:3',
            'price'=>'required|numeric',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);



       $meal = Meal::create($request->all());


        return redirect()->back()->with('message','A new meal has been added');
    }


}
