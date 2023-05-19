@extends('layouts.adm')

@section('content')
<h1>Create dictionary</h1><hr>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">

                <form method="POST" action="{{ route('dictionary.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="word"><h3>Word:</h3></label>
                        <input type="text" id="word" name="word" placeholder="Word..">

                    </div><hr>
                    <div class="form-group">
                        <label for="translation"><h3>Translation:</h3></label>
                        <input type="text" id="translation" name="translation" placeholder="Translation..">

                    </div><hr>
                    <div class="form-group">
                        <label for="transcription"><h3>Transcription:</h3></label>
                        <input type="text" id="transcription" name="transcription" placeholder="Transcription..">

                    </div><hr>
                    <div class="form-group">
                        <label for="img"><h3>Image:</h3></label>
                        <input type="file" id="img" name="img">

                    </div><hr>




                    <div class="form-group mt-3">
                        <button class="btn btn-outline-primary"  type="submit">Save Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
