@extends('layouts.app')

@section('title','Alga.com')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('posts.update',$post->id)}}" method="post">

                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="inputType" class="form-label">Name:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputType" name="title"
                                   value="{{$post->title}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="brand" class="form-label">Content:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="content"
                                   value="{{$post->content}}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="category" class="form-label">Category:</label>
                        </div>
                        <div class="col-9">
                            <select name="category_id" id="category" class="form-control">
                                @foreach($categories as $cat)
                                    <option @if($cat->id == $post->category_id) selected
                                            @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-success mt-4"> U P D A T E</button>
                    </div>
                </form>
                <br>

            </div>
        </div>
    </div>
@endsection
{{--}}<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create post</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<a href="{{ route('posts.index') }}">Go to create page</a>


<form action="{{route('posts.update',$post->id)}}" method="post" >
    @csrf
    @method('PUT')
    title:
    <input type="text" name="title" value="{{$post->title}}"> <br>
    Category:
    <select class="form-control" name="category_id" id="categoryInput">
        @foreach($categories as $cat)
            <option @if($cat->id == $post->category_id) selected @endif selected value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach

    </select><br>
    content: <br>
    <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea> <br>
    <button  type="submit">Update Post</button><br>
</form>

</body>
</html>--}}

