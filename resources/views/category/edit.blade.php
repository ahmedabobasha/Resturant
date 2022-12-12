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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary">
                       Edit category
                    </div>
                    <form method="POST" action="{{route('cat.update',$id->id)}}" >
                        @csrf
                        <div class="card-body text-right">
                            <div class="form-group">
                                <label for="cat">category name</label>
                                <input type="text" name="cat_name" value="{{$id->cat_name}}" class="form-control">
                            </div>
                            <div class="form-group text-center ">
                                <input type="submit" value="update"  class="btn btn-primary  " >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
