@extends('layouts.app')

@section('title', 'Результаты теста')

@section('content')
    <h1>Результаты теста</h1>
    <p>Вы ответили правильно на {{ $score }} из {{ $total }} вопросов.</p>
@endsection
