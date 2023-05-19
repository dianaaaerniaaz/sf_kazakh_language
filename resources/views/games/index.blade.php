@extends('layouts.app')

@section('title','Game Page')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-center my-5" style="background: PowderBlue;max-width: 500px; margin: 0 auto; "><b style="color: #0b0b0b">{{ __('messages.guess') }}</b></h1>
    <h5 class="text-center my-5"><i>{{ __('messages.imp') }}</i></h5>
    <h3 class="text-center my-5">{{ __('messages.mix') }}: {{ $game->mixed_letters }}</h3>

    <form class="mx-auto text-center" method="POST"  action="{{ route('games.check', $game) }}" >
        @csrf
        <label  for="answer"  >{{ __('messages.ans') }}:</label>
        <input type="text" name="answer" class="form-control" style="max-width: 300px; margin: 0 auto;box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); border-color: #ccc;">
        <button type="submit" class="btn btn-primary mt-3">{{ __('messages.check') }}</button>
    </form>
@endsection

@section('styles')
    <style>
        body {
            background-color: #f2f2f2;
        }
    </style>
@endsection
