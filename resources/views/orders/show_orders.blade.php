@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container justify-content-center">
            <div class="card">
                <div class="card-header bg-success text-center">
                   previous orders
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Meal Name</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price meal</th>
                            <th scope="col">Total price </th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>

                            <td>{{$order->user->name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->user->email}}</td>
                            <td>{{$order->date}}</td>
                            <td>{{$order->time}}</td>
                            <td>{{$order->order_meal->name}}</td>
                            <td>{{$order->qty}}</td>
                            <td>{{$order->order_meal->price}}</td>
                            <td>{{$order->qty * $order->order_meal->price}}$</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
               </div>
            </div>
        </div>
    </div>
@endsection
