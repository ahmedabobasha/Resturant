@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card ">
                <div class="card-header text-center">
            <a href="{{route('meal.index')}}" ><button type="button" class="btn btn-info">meal show </button></a>
            <a href="{{route('meal.create')}}" ><button type="button" class="btn btn-primary">Add meal</button></a>
            <a href="{{route('cat.show')}}" ><button type="button" class="btn btn-success">Show category</button></a>
                </div>
                </div>
            <table class="table" border="10">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">date</th>
                    <th scope="col">time</th>
                    <th scope="col">meal name</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">total price</th>
                    <th scope="col">address</th>
                    <th scope="col">accept</th>
                    <th scope="col">Refuse</th>
                    <th scope="col">order done</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)

                <tr>
                    <td>{{$order->user ? $order->user->name :'user not found'}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->user ? $order->user->email :'email not found'}}</td>
                    <td>{{$order->date}}</td>
                    <td>{{$order->time}}</td>
                    <td>{{$order->order_meal? $order->order_meal->name :'name not found'}}</td>
                    <td>{{$order->qty}}</td>
                    <td>${{$order->order_meal ? $order->order_meal->price :'price not found'}}/-</td>
                    <td>${{$order->order_meal->price * $order->qty}}/-</td>
                    <td>{{$order->address}}</td>
                    <td><input type="submit" name="accept" class="btn btn-primary btn-sm"></td>
                    <td><input type="submit" name="Refuse" class="btn btn-danger btn-sm"></td>
                    <td><input type="submit" name="" class="btn btn-success btn-sm"></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
