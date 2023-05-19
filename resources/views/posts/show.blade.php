@extends('layouts.app')

@section('title','ALga.kz')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <dl class="row fs-4">

                    <dt class="col-sm-3"><b>{{ __('messages.Title') }}:</b></dt>
                    <dd class="col-sm-9" style="color: #0b0b0b"><h1><b style="color: #0b0b0b">{{ $post->{'title_'.app()->getLocale()} }}</b></h1></dd><hr>
                    <iframe width="350" height="455" src="{{asset($post->img)}}" title="img" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <dt class="col-sm-3"><b>{{ __('messages.Content') }}:</b></dt>
                    <dd class="col-sm-9">{{ $post->{'content_'.app()->getLocale()} }}</dd><hr>

                    <div class="col d-md-flex justify-content-center">


                        @auth()
                            @if($like)
                                <form action="{{route('posts.like',$post->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="like" value="false">
                                    <b>{{ __('messages.ReRead') }}</b>
                                    <button class="btn btn-secondary-soft">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                                            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5Zm6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                                        </svg><br>
                                    </button><br>
                                </form><br>
                            @else
                                <form action="{{route('posts.like',$post->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="like" value="true">
                                    {{ __('messages.Read') }}
                                    <button class="btn btn-secondary-soft">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                                            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                                        </svg>
                                    </button>
                                </form><br>
                            @endif
                        @endauth
                    </div>
                           <hr>
                    @can('update',$post)
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-success mt-4"
                               style="letter-spacing: 2px">{{ __('messages.edit') }}</a><br><br>
                    @endcan
                     @can('delete',$post)
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >{{ __('messages.delete') }}</button>
                        </form>
                    @endcan
                </dl>
            </div>
        </div>


    </div>
@endsection
