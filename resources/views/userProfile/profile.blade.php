@extends('layouts.app')
{{--<link rel="stylesheet" href="app.css">--}}

@section('title','Home Page')

@section('content')
    <link rel="stylesheet" href=" href={{asset("app/css/profile.css")}}">
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h1 class="dark-color">About Me</h1><hr>
                        <h6 class="theme-color lead"></h6>
                         <div class="row about-list">

                            <div class="col-md-6">
                                <div class="media">
                                    <label><h4>Name</h4></label>
                                    <h4 style="margin-left: 45px">{{Auth::user()->name }}</h4>
                                </div><hr>
                                <div class="media">
                                    <label><h4>E-mail</h4></label>
                                    <h4 style="margin-left: 25px">{{Auth::user()->email }}</h4>
                                </div><hr>
                                <div class="media">
                                    <label><h4>Edit</h4></label>
                                    <a href="{{route('profile.edit',Auth::user()->id)}}" class="btn btn-outline-primary" style="margin-left: 35px">{{ __('messages.edit') }}</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="{{asset(Auth::user()->img)}}" width="320px" height="300px">
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
