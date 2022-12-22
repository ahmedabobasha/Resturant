@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-center ">
                Meal details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                            <h3> <strong style="color: seagreen ; font-size: 22px  ">category meal:
                                </strong>{{ $meal->category }}</h3>
                            </p>

                            <p>
                            <h3> <strong style="color: seagreen ; font-size: 22px  ">category name :
                                </strong>{{$meal->name}}</h3>
                            </p>

                            <p>
                            <h3> <strong style="color: seagreen ; font-size: 22px  ">price :
                                </strong> {{ $meal->price }}$</h3>
                            </p>
                            <p>
                            <h3> <strong style="color: seagreen ; font-size: 22px  ">Meal description :</p>
                                    <p></strong>{{ $meal->description }}</h3>
                            </p>

                        </div>
                        <div class="col-md-4">
                            <img src="{{asset($meal->image)}}"class="img-thumbnail" style="width:500px" >

                        </div>



            </div>
            </div>
        </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-uppercase text-center">order information</div>
                    <div class="card-body">
                        @if(Auth::check())
                        <p>
                        <h3> <strong style="color: seagreen ; font-size: 22px  ">name :</p>
                                <p></strong>{{ auth()->user()->name }}</h3>
                        </p>
                        <p>
                        <h3> <strong style="color: seagreen ; font-size: 22px  ">email :</p>
                                <p></strong>{{auth()->user()->email}}</h3>
                        </p>

                        <form method="post" action="{{route('order.store')}}">
                            @csrf
                            <div >
                                <label for="phone" >phone number</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                            <div>
                                <input type="hidden" value="{{$meal->id}}" name="meal_id">
                            </div>
                           <div>
                               <label for="quantity">quantity</label>
                               <input type="number" name="quantity"  class="form-control" required>
                           </div>
                            <div>
                                <label for="date">Date</label>
                                <input type="date"  name="date" class="form-control" required>
                            </div>
                            <div>
                                <label for="date">time</label>
                                <input type="time"  name="time" class="form-control" required>
                            </div>
                            <div>
                                <label for="address">address</label>
                                <textarea name="address" class="form-control" required></textarea>
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success ">
                            </div>
                        </form>
                        @else
                            <a href="/login">sorry you must be login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
