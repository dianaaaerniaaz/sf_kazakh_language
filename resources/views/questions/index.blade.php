@extends('layouts.adm')

@section('title', 'Список вопросов')

@section('content')
    <h1 class="text-center"> Список вопросов</h1><hr>
    <ul >
        @foreach ($questions as $question)
            <li class="text-center">{{ $question->question_text }}</li><hr>
        @endforeach
    </ul>
@endsection
