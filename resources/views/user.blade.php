@extends('layouts.app')
@section('content')
{{--    message --}}
    @if (session('message'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('message') }}
    </div>
@endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 ">

                <div class="card-header  text-center " >
                 Category list
                    <div class="card-body">
                        <form >
                            <a class="list-group-item list-group-item-action" href="/home">Main page</a>
                        @foreach($categories as $cat)
                            <input type="submit" name="category" value="{{$cat->cat_name}} "
                                   class="list-group-item-action" >
                        @endforeach
                        </form>
                    </div>
                    <div class="card-header bg-success">
                       previous orders
                    </div>
                    <div class="card-body ">
                        <a href="{{route('order.show')}}" class="btn btn-primary">show previous orders</a>

                    </div>



                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary">Meals </div>

                    <div class="card-body">
                       <div class="row text-center" >
                         @forelse($meals as $meal)
                               <div class="col-md-4 mt-2" style="border: 1px solid rgb(149,212,159);">
                                   <img src="{{asset($meal->image)}}" class="img-thumbnail" style="width: 100%;">
                                    <strong>{{$meal->name}}</strong>
                                   <p>{{$meal->description}}</p>
                                   <div>
                                       <a href="{{route('meal.details',$meal->id)}}" class="btn btn-primary" >order now</a>
                                   </div>
                    </div>
                           @empty
                           <p>no meals found</p>
                           @endforelse
            </div>
        </div>
    </div>


@endsection
