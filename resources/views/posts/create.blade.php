@extends('layouts.app')

@section('title','Create Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <a  href="{{ route('posts.index') }}" class="btn btn-outline-primary">Go to create page</a>
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" placeholder="Title..">
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contentInput">Content</label>

                        <textarea class="form-control @error('content') is-invalid @enderror" id="contentInput" rows="3" name="content" placeholder="Content.."></textarea>
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">Content</label>
                        <select class="form-control" name="category_id" id="categoryInput">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imgInput" class="frpm-label">File</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img">
                        @error('img')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-outline-primary"  type="submit">Save Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection

{{--}}<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>All products</title>

</head>
<body>
    <a href="{{ route('posts.index') }}">Go to index page</a>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        Title: <input type="text" name="title"> <br><br>
        Category:
        <select class="form-control" name="category_id" id="categoryInput">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach

        </select><br><br>
        Content: <textarea name="content" cols="30" rows="10"></textarea>
        <button type="submit"> Save</button>
    </form>
</body>
</html>--}}
