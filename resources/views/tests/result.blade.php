@extends('layouts.app')

@section('title', 'Результаты теста')

@section('content')
    <h1 class="text-center"><b>{{ __('messages.res') }}</b></h1>
    <h3 class="text-center">Вы ответили правильно на {{ $score }} из {{ $total }} вопросов.</h3>
    <div class="image-container">
        <img src="https://www.sor.org/getmedia/149f97a8-044b-4efa-80dc-d1250b621dbf/istock-1133849148.jpg" alt="Мое фото" width="750px" height="520px">
    </div>

    <style>
        .image-container {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection
