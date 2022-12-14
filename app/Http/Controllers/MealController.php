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


    public function edit(Meal $id)
    {
        $cats = Meal::all();
        return view('meal.edit',compact('id','cats'));
    }
    public function update(Request $request ,Meal $id)
    {
        $request->validate([
            'name'=>'required|string|min:3',
            'description'=>'required|min:3',
            'price'=>'required|numeric',
           // 'image'=>'required|mimes:png,jpg,jpeg'
            ]);
        $id->update($request->all());
       return redirect()->route('meal.index')->with('message','data has been update');
    }

}
