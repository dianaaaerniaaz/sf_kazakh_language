@extends('layouts.app')
{{--<link rel="stylesheet" href="app.css">--}}

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
    <h1>Угадай слово</h1>
    <h5><i>*ВАЖНО!!!* Пишите ответы заглавными буквами!</i></h5>

    <p>Перемешанные буквы: {{ $game->mixed_letters }}</p>

    <form method="POST" action="{{ route('games.check', $game) }}">
        @csrf
        <label for="answer">Ответ:</label>
        <input type="text" name="answer">
        <button type="submit">Проверить</button>
    </form>


@endsection
