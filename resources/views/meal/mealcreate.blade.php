@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">list</div>
                    <div class="card-body text-right ">
                        <ul class="list-group ">
                            <a href="{{ route('meal.index') }}" class="list-group-item list-group-item-action ">Show Meal</a>
                            <a href="{{route('meal.create')}}" class="list-group-item list-group-item-action">Add Meal</a>
                            <a href="/home" class="list-group-item list-group-item-action">users order</a>
                        </ul>
                    </div>
                </div>
            </div>

    <div class="container col-md-9">
        <div class="card-body">
            <div class="card-header lh-lg text-light text-center bg-danger ">
                meal
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div>
                <form action="{{route('meal.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" >MealName</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div>
                        <label for="description">Description</label>
                      <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="price">($)price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div>
                        <label for="select">select category</label>
                        <select name="category" class="form-control">
                            @foreach($cat_name as $name)
                            <option value="{{$name->cat_name}}">{{$name->cat_name}}</option>
                            @endforeach()
                        </select>

                    </div>
                    <div>
                    <label for="image" >Meal image</label>
                    <input type="file" name="image" class="form-control">
                    </div>
                    <br>
            <div class="form-group text-center">
                <button class="btn btn-danger" type="submit">حفظ</button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection
