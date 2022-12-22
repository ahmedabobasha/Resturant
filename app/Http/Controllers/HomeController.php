<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = category::all();
        if (Auth()->user()->is_admin == 1) {
            $orders = Order::ORDERBY('id','desc')->get();
            return view('AdminPage', compact('orders'));
        } else {
            if (!$request->category) {
                $meals = Meal::all();
                return view('user', compact('categories', 'meals'));
            } else {
                $meals = Meal::where('category', $request->category)->get();
                return view('user', compact('categories', 'meals'));
            }
        }
    }
    public function store(Request $request)
    {

        Order::create([

            'user_id'=>Auth()->user()->id,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time'=>$request->time,
            'meal_id'=>$request->meal_id,
            'qty'=>$request->quantity,
            'address'=>$request->address,
            'status'=>'waiting',
        ]);
        return redirect()->route('home')->with('message','Ordered successfully');

    }


    public function show()
    {

   $orders = Order::where('user_id',Auth()->user()->id)->get();

        return view('orders.show_orders',compact('orders'));
    }

    public function ChangeStatus(Request $request,$id)
    {

      Order::where('id',$id)->update(['status'=>$request->status]);
      return back();
    }
}
