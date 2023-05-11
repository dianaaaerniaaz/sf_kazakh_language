@extends('layouts.app')

@section('content')
<h1>Dictionary</h1>
<ul>
    @foreach ($words as $word)
    <li>{{ $word->word }} - {{ $word->transcription }} - {{ $word->translation }}</li>
    @endforeach
</ul>
@endsection
