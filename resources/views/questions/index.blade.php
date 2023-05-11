@extends('layouts.app')

@section('title', 'Список вопросов')

@section('content')
    <h1>Список вопросов</h1>
    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->question_text }}</li>
        @endforeach
    </ul>
@endsection
