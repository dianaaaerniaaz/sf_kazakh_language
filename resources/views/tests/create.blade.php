@extends('layouts.app')

@section('title', 'Пройти тест')

@section('content')
    <h1 class="text-center">Пройти тест</h1>

    <form action="{{ route('tests.store') }}" method="POST" class="text-center">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">


        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            </li>
            <div class="container mt-2" >
                <div class="row g-4">
                    @foreach($categories as $cat)
                        <div class="col-md-2" style="margin-right: 30px;"><hr>
                            <div class="card d-inline-flex w-100 shadow-sm">
                                <div class="card-header bg-white">
                                    <a href="{{route('questions.category',$cat->id)}}" class="list-group-item list-group-item-action list-group-item-primary" style="width: 180px; height: 120px; padding: 20px; ">{{$cat->name}}<p>{{$cat->code}}</p></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><br>
            </div></ul>
        </div>


        <ul class="list-unstyled" style="max-width: 500px; margin-left: auto; margin-right: auto;">
            @foreach ($questions as $question)
                <input type="hidden" name="category_id" value="{{ $question->category_id }}">
                <li class="my-4" style="padding: 10px;">
                    <h3 style="max-width: 600px; margin-left: auto; margin-right: auto; padding-left: 0px;">{{ $question->question_text }}</h3>
                    <ul class="list-unstyled" style="max-width: 400px; margin-left: auto; margin-right: auto; padding-right: 300px;">
                        <li><input type="radio" name="answer_{{ $question->id }}" value="1">{{ $question->option1 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="2">{{ $question->option2 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="3">{{ $question->option3 }}</li>
                        <li><input type="radio" name="answer_{{ $question->id }}" value="4">{{ $question->option4 }}</li>
                    </ul>
                </li>
            @endforeach
        </ul>

        <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div> </form>
@endsection
