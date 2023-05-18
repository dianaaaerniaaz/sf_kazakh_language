@extends('layouts.app')

@section('title', 'Создать вопрос')

@section('content')
    <h1 class="text-center"><b><i>Создать вопрос</i></b></h1><hr>
    <form action="{{ route('questions.store') }}" method="POST" class="text-center">
        @csrf
        <div >
            <label for="question_text"><h4>Текст вопроса:</h4></label>
            <input type="text" name="question_text" id="question_text">
        </div><br>
        <div>
            <label for="option1"><h4>Вариант ответа 1:</h4></label>
            <input type="text" name="option1" id="option1">
        </div><br>
        <div>
            <label for="option2"><h4>Вариант ответа 2:</h4></label>
            <input type="text" name="option2" id="option2">
        </div><br>
        <div>
            <label for="option3"><h4>Вариант ответа 3:</h4></label>
            <input type="text" name="option3" id="option3">
        </div><br>
        <div>
            <label for="option4"><h4>Вариант ответа 4:</h4></label>
            <input type="text" name="option4" id="option4">
        </div><br>
        <div>
            <label for="correct_option"><h4>Правильный вариант ответа:</h4></label>
            <select name="correct_option" id="correct_option">
                <option value="1">Вариант ответа 1</option>
                <option value="2">Вариант ответа 2</option>
                <option value="3">Вариант ответа 3</option>
                <option value="4">Вариант ответа 4</option>
            </select>
        </div><br>
        <div>
            <label for="category_id"><h4>Категория:</h4></label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div><br>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
