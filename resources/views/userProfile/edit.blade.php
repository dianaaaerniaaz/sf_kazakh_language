@extends('layouts.app')

@section('title','EDIT PAGE')

@section('content')

    <div class="container">
        <a href="{{ route('posts.index') }}">{{ __('messages.index') }}</a>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('profile.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titleInput">{{ __('messages.name') }}:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contentInput">{{ __('messages.avatar') }}</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-outline-primary" type="submit">{{ __('messages.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
