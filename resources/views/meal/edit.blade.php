@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header bg-primary text-center" >
           Edit meal
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class="card-body">
            <form method="post" action="{{route('meal.update',$id->id)}}"enctype="multipart/form-data" >
                @csrf
                <input type="hidden"  name="old_image"  value="{{$id->image}}">
                <div>
                    <label for="name">Meal name</label>
                    <input type="text" name="name" value="{{$id->name}}" class="form-control">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" name="description"  class="form-control">{{$id->description}}</textarea>

                </div>
                <div>
                    <label for="price">price</label>
                    <input type="number" name="price" value="{{$id->price}}" class="form-control" >
                </div>
                <div>
                    <label for="category">choose category</label>
                    <select name="category" class="form-control">
                        @foreach($cats as $cat)
                        <option value="{{$cat->cat_name}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image">meal image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <img src="{{asset($id->image)}}" id="showImage" style="width: 100px; height: 100px;">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="bt btn-primary " value="update" >
                </div>
            </form>
        </div>
        </div>

@endsection
