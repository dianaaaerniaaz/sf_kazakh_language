@extends('layouts.app')
{{--<link rel="stylesheet" href="app.css">--}}

@section('title','Home Page')

@section('content')
    <link rel="stylesheet" href={{asset("app/css/style.css")}}>
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text "><h3>“Өзге тілдің бәрін біл,  <br>
                                    өз тіліңді құрметте!”<br></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text "><h3>“Өзге тілдің бәрін біл,  <br>
                                    өз тіліңді құрметте!”<br></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3>“Өзге тілдің бәрін біл,  <br>
                                    өз тіліңді құрметте!”<br></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               @can('create',\App\Models\Post::class)
                    <a class="btn btn-outline-primary" href="{{ route('posts.create') }}">Go to create post</a>
                    <a class="btn btn-outline-primary" href="{{ route('questions.create') }}">Go to create test</a><br><br>
               @endcan
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    </li>
                    <div class="container mt-2" >
                        <div class="row g-4">
                            @foreach($categories as $cat)
                                <div class="col-md-2" style="margin-right: 30px;"><hr>
                                    <div class="card d-inline-flex w-100 shadow-sm">
                                        <div class="card-header bg-white">
                                            <a href="{{route('posts.category',$cat->id)}}" class="list-group-item list-group-item-action list-group-item-primary" style="width: 180px; height: 120px; padding: 20px; ">{{$cat->name}}<p>{{$cat->code}}</p></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><br>
                    </div></ul>
                    </div>

            <div class="container mt-6" style="text-align: center;">
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-md-4 my-3" style="padding: 0;">
                            <div class="p-3 text-primary-emphasis bg-primary-subtle">
                                <div class="list-group-item list-group-item-action list-group-item" style="max-width: 580px;">
                                    <h5>{{ $post->{'title_'.app()->getLocale()} }}</h5>
                                    <h6>{{$post->category->name}} - <a href="{{route('posts.show', $post->id)}}" class="">Подробнее</a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </div>

    <div class="card">
        <div class="tools">
            <div class="circle">
                <span class="red box"></span>
            </div>
            <div class="circle">
                <span class="yellow box"></span>
            </div>
            <div class="circle">
                <span class="green box"></span>
            </div>
        </div>
        <div class="card__content">
        </div>
    </div>

@endsection

{{--@extends('layouts.app')
@section('title','Index Page')
@section('content')
    @foreach($categories as $cat)
        <a href="{{route('posts.category', $cat->id)}}">{{$cat->name}}</a>
    @endforeach<br><hr>
    <a href="{{ route('posts.create') }}">Go to create page</a>
    @foreach($posts as $post)
        <a href="{{route('posts.show',$post->id)}}"><h3>{{$post->title}}</h3></a>
        <p>{{$post->content}}</p>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>

        </form>

    @endforeach

@endsection--}}

