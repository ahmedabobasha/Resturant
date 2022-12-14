@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">القائمة</div>
                    <div class="card-body  ">
                        <ul class="list-group ">
                            <a href="{{ route('meal.index') }}" class="list-group-item list-group-item-action ">MealShow </a>
                            <a href="{{route('meal.create')}}" class="list-group-item list-group-item-action">Add Meal</a>
                            <a href="/home" class="list-group-item list-group-item-action">users order</a>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="container col-md-9">

                <div class="card-header bg-danger text-center">
                    All meal
                </div>
                @if (session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">image</th>
                            <th scope="col">meal name</th>
                            <th scope="col">Description</th>
                            <th scope="col">category</th>
                            <th scope="col">price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($meals)>0)
                            @foreach($meals as $key=> $meal)
                            <tr>
                                <th scope="row">{{$key=$key+1}}</th>
                                <td><img src="{{asset($meal->image) }}" width="80"></td>
                                <td>{{$meal->name}}</td>
                                <td>{{$meal->description}}</td>
                                <td>{{$meal->category}}</td>
                                <td>{{$meal->price}}</td>
                                <td><a href="{{route('meal.edit',$meal->id)}}" class="btn btn-primary">edit</a></td>
                                <td><a href="#" class="btn btn-danger">delete</a></td>

                            </tr>
                          @endforeach
                        @else
                        <p>No meals</p>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            @endsection


