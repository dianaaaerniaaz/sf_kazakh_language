@extends('layouts.app')

@section('content')
<h1>Dictionary</h1>
<table class="table">
    <thead>
    <tr>
        <th>Word</th>
        <th>Transcription</th>

        <th>Image</th>
        <th></th>
        {{--            <th scope="col">Edit</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach ($words as $word)
        <tr>
            <td>{{ $word->word }}</td>

            <td>{{ $word->{'translation_'.app()->getLocale()} }}</td>
            <td><img src="{{asset($word->img)}}" width="300px" height="250px"></td>
            <td>
                @can('destroy',\App\Models\Post::class)
                <form method="POST" action="{{ route('dictionary.destroy', $word) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

@endsection
