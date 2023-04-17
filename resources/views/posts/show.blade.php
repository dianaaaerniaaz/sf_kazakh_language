@extends('layouts.app')

@section('title','ALga.kz')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <dl class="row fs-4">
                    <dt class="col-sm-3"><b>Name:</b></dt>
                    <dd class="col-sm-9">{{$post->title}}</dd><hr>
                    <dt class="col-sm-3"><b>Content:</b></dt>
                    <dd class="col-sm-9">{{$post->content}}</dd><hr>
                    <iframe width="560" height="315" src="{{asset($post->img)}}" title="img" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <div class="col d-md-flex justify-content-center">


                        @auth()
                            @if($like)
                                <form action="{{route('posts.like',$post->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="like" value="false">
                                    <b>Delete to the list:</b>
                                    <button class="btn btn-secondary-soft">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg><br>
                                    </button><br>
                                </form><br>
                            @else
                                <form action="{{route('posts.like',$post->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="like" value="true">
                                    {{__('add to the list')}}
                                    <button class="btn btn-secondary-soft">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </button>
                                </form><br>
                            @endif
                        @endauth
                    </div>
                           <hr>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-success mt-4"
                               style="letter-spacing: 2px">EDIT DESCRIPTION</a><br><br>





                    @can('delete',$post)
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
                        </form>
                    @endcan
                </dl>
            </div>
        </div>
        {{--}}<div class="col d-md-flex justify-content-center">
            @can('update',$clothes)
                <a href="{{route('clothes.edit', $clothes->id)}}" class="btn btn-outline-success mt-4"
                   style="letter-spacing: 2px">EDIT DESCRIPTION THIS CLOTHING</a><br><br>
            @endcan
        </div>--}}
        {{--@if (auth()->check())
            @if (auth()->user()->role == ('admin'))
                <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
                </form>
            @elseif (auth()->user()->role == ('moderator'))
                <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
                </form>
            @endif
        @endif
--}}



       {{--}} @can('delete',$clothes)
            <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
            </form>
        @endcan--}}


            {{--<form action="{{route('clothes.uncart',$clothes->id)}}" method="post">
                @csrf
                <button class="btn btn-outline-info" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);">Delete from cart</button><hr>
            </form>--}}



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
<h3>{{$post->title}}</h3>
<p>{{$post->content}}</p>

<a href="{{route('posts.edit',$post->id)}}">Edit</a>


</body>
</html>
--}}
