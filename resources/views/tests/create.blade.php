@extends('layouts.app')

@section('title', 'Пройти тест')

@section('content')
    <h1>Пройти тест</h1>
    <form action="{{ route('tests.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div>
            <label for="category_id">Выберите категорию:</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <ul>
            @foreach ($questions as $question)
                <li>
                    <p>{{ $question->question_text }}</p>
                    <ul>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="1">{{ $question->option1 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="2">{{ $question->option2 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="3">{{ $question->option3 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="4">{{ $question->option4 }}</li>
                    </ul>
                </li>
            @endforeach
        </ul>
        <button type="submit">Submit</button>
    </form>
@endsection
