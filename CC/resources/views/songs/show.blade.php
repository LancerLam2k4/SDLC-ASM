@extends('layouts.app')

@section('title', 'Show Song')

@section('contents')
    <div class="container" style="margin-left:225px ">
        <h1 class="mb-4">Detail Song</h1>
        <hr />
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" value="{{ $songs->title }}" readonly>

                <label class="form-label mt-3">Artist</label>
                <input type="text" class="form-control" value="{{ $songs->artist }}" readonly>

                <label class="form-label mt-3">Created At</label>
                <input type="text" class="form-control" value="{{ $songs->created_at }}" readonly>

                <label class="form-label mt-3">Updated At</label>
                <input type="text" class="form-control" value="{{ $songs->updated_at }}" readonly>
                <label class="form-label mt-3" style="margin-left:45%">Listen</label><br/>
                <audio controls style="margin-left:20%">
                    <source src="{{ asset('storage/audio_file/' . $songs->audio_file) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6 mb-3">
                <img src="{{ asset('storage/images/' . $songs->image) }}" alt="Song Image" class="img-thumbnail" style="margin-left:20%"><br/>

                <label class="form-label mt-3" style="margin-left:45%">Lyrics</label><br/>
                <textarea class="form-control" readonly style="height:300px;">{{ $songs->lyrics }}</textarea>
            </div>
        </div>
    </div>
@endsection
