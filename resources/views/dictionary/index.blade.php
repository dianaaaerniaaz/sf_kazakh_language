@extends('layouts.app')

@section('content')
<h1>Dictionary</h1>
<table class="table">
    <thead>
    <tr>
        <th>{{ __('messages.Word') }}</th>
        <th>{{ __('messages.trans') }}</th>

        <th>{{ __('messages.image') }}</th>
        <th></th>
        {{--            <th scope="col">Edit</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach ($words as $word)
        <tr>
            <td>{{ $word->word }}</td>

            <td>{{ $word->{'translation_'.app()->getLocale()} }}</td>
            <td><img src="{{asset($word->img)}}" width="250px" height="200px"></td>
            <td>
                @can('destroy',\App\Models\Post::class)
                <form method="POST" action="{{ route('dictionary.destroy', $word) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('messages.delete') }}</button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

@endsection
