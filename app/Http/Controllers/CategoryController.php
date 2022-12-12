<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class CategoryController extends Controller
{
    public function show()
    {
        $catnames=category::all();
        return view('category.categorypage',compact('catnames'));
    }
    public function store(Request $request)
    {
       $data = $request->all();
       // validation //
    $request->validate([
           'catname'=>['required','min:4','string','max:30']
       ]);
       category::create([
        'cat_name'=>$data['catname'],
         'created_at'=>Carbon::now()
      ]);

       return redirect()->back()->with('message','save success');
    }

    public function edit(category $id )
    {

        return view('category.edit',compact('id'));
    }
    public function update(Request $requestdata, category $id)
    {
        $requestdata->validate([
            'cat_name'=>['required','min:4','unique:categories','string','max:30']
        ]);
       $id->update($requestdata->all());
       return redirect()->route('cat.show');

    }

    public function delete($id)
    {

        category::find($id)->delete();
     return redirect()->back()->with('message','delete success');
    }
}

