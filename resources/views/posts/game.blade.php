
@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.guess') }} </div>


                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{ session('success_message') }}
                            </div>
                        @endif

                        @if(session('error_message'))
                            <div class="alert alert-danger">
                                {{ session('error_message') }}
                            </div>
                        @endif



                            <h1> {{ $clean_word }}</h1>
 <hr>

                        <form method="POST" action="{{ route('game.guess-word') }}">
                            @csrf
                            <div class="form-group">
                                <label for="word">{{ __('Guess the word:') }}</label>
                                <input type="text" class="form-control" id="word" name="word" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        @font-face {
            font-family: 'ArialUnicodeMS';
            src('app/fonts/arialuni.ttf') format('truetype');
        }
        .letter-box {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
            margin-right: 5px;
            overflow: visible;
        }

        .letter {
            font-size: 24px;
            overflow: visible;
        }


        .letter-box:last-child {
            margin-right: 0;
        }



        .blank {
            color: white;
            background-color: black;
        }

        .guessed-letter {
            display: inline-block;
            font-size: 24px;
            margin-right: 5px;
        }
    </style>
@endsection
