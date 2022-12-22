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
            <table class="table table-bordered text-center " >
                <thead>
                <tr class="text-uppercase">
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
                    <th scope="col">status</th>
                    <th scope="col">Action</th>

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
                    <td>{{$order->order_meal->price}}$/-</td>
                    <td>{{$order->order_meal->price * $order->qty}}$/-</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->status}}</td>
a
                    <form method="post" action="{{route('order.status',$order->id)}}">
                        @csrf
                        <td>
                        @if($order->status == 'waiting')
                        <input type="submit" name="status" value="accept" class="btn btn-primary btn-sm">
                        <input type="submit" name="status" value="Refuse" class="btn btn-danger btn-sm">

                            @elseif($order->status == 'accept')
                        <input type="submit" name="status" value="completion" class="btn btn-success btn-sm">
                        @else
                            <input type="submit" name="status" value="waiting" class="btn btn-success btn-sm">
                        @endif
                        </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
