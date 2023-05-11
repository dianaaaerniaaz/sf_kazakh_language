@extends('layouts.app')

@section('title', 'Создать вопрос')

@section('content')
    <h1>Создать вопрос</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div>
            <label for="question_text">Текст вопроса:</label>
            <input type="text" name="question_text" id="question_text">
        </div>
        <div>
            <label for="option1">Вариант ответа 1:</label>
            <input type="text" name="option1" id="option1">
        </div>
        <div>
            <label for="option2">Вариант ответа 2:</label>
            <input type="text" name="option2" id="option2">
        </div>
        <div>
            <label for="option3">Вариант ответа 3:</label>
            <input type="text" name="option3" id="option3">
        </div>
        <div>
            <label for="option4">Вариант ответа 4:</label>
            <input type="text" name="option4" id="option4">
        </div>
        <div>
            <label for="correct_option">Правильный вариант ответа:</label>
            <select name="correct_option" id="correct_option">
                <option value="1">Вариант ответа 1</option>
                <option value="2">Вариант ответа 2</option>
                <option value="3">Вариант ответа 3</option>
                <option value="4">Вариант ответа 4</option>
            </select>
        </div>
        <div>
            <label for="category_id">Категория:</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
