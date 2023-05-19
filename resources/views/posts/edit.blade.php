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
                            <label for="inputType" class="form-label">{{ __('messages.Title') }}:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputType" name="title"
                                   value="{{$post->title}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="brand" class="form-label">{{ __('messages.Content') }}:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="content"
                                   value="{{$post->content}}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="category" class="form-label">{{ __('messages.Category') }}:</label>
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
                        <button class="btn btn-outline-success mt-4">{{ __('messages.update') }}</button>
                    </div>
                </form>
                <br>

            </div>
        </div>
    </div>
@endsection

