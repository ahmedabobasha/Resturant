<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Meal;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::all();


    if(!$request->category){
        $meals =Meal::all();
        return view('Visitor',compact('categories','meals'));
    }else{

      $meals = Meal::where('category',$request->category)->get();

        return view('Visitor',compact('categories','meals'));
    }


    }
}
