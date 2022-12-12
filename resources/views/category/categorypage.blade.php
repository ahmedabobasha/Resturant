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
            <div class="col-md-4">
                <div class="card">
            <div class="card-header text-center">
                category
            </div>
            <form action="{{route('cat.store')}}" method="POST" >
                @csrf
                <div class="card-body text-right">
                    <div class="form-group">
                        <label for="cat">category name</label>
                        <input type="text" name="catname" class="form-control">
                </div>
                    <div class="form-group text-center">
                        <input type="submit" value="save"  class="btn btn-primary  " >
                    </div>
                </div>
            </form>
                </div>
            </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">category</div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">catname</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($catnames as $key=> $name)

                        <tr>
                            <th scope="row">{{$key=$key+1}}</th>
                            <td>{{$name->cat_name}}</td>
                            <td><a href="{{route('cat.edit',$name->id)}}" class="btn btn-primary " >Edit</a></td>
                            <td><a href="{{route('cat.delete',$name->id)}}"  id="delete" class="btn btn-danger">Delete</a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

        </div>
            </div>
        </div>

@endsection
