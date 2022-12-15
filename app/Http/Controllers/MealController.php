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
    $meals= Meal::paginate(5);
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

    $image = $request->file('image');
    $name_gen =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

    Image::make($image)->resize(300,300)->save('upload/Meals/'.$name_gen);

    $save_url ='upload/Meals/'.$name_gen;

        Meal::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'image'=>$save_url,
        ]);


        return redirect()->back()->with('message','A new meal has been added');
    }


    public function edit(Meal $id)
    {

        $cats =category::all();
        return view('meal.edit',compact('id','cats'));
    }


    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required|string|min:3',
            'description'=>'required|min:3',
            'price'=>'required|numeric',
            'image'=>'required|mimes:png,jpg,jpeg'
            ]);

        $image = $request->file('image');
        $name_gen =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(300,300)->save('upload/Meals/'.$name_gen);

        $save_url ='upload/Meals/'.$name_gen;

        Meal::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'image'=>$save_url,
      ]);

       return redirect()->route('meal.index')->with('message','data has been update');
    }

    public function delete(Meal $id)
    {
        $id->delete();
        return redirect()->back()->with('message','delete success');
    }
}
