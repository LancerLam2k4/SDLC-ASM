@extends('layouts.app')

@section('title', 'Edit Song')

@section('contents')
<div class="container" style="margin-left:225px ">
    <h1 class="mb-0">Edit Song</h1>
    <hr />

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('songs.update', $song->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $song->title }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Artist</label>
                <input type="text" name="artist" class="form-control" placeholder="Artist" value="{{ $song->artist }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Image Song</label>
                <div class="input-group">
                    <input type="file" class="form-control" name="image" id="imageInput" accept="image/*" style="display: none;">
                    <input type="text" class="form-control" readonly placeholder="Select Image" aria-label="Select Image" aria-describedby="buttonImage" onclick="document.getElementById('imageInput').click()">
                    <button class="btn btn-outline-secondary" type="button" id="buttonImage" onclick="document.getElementById('imageInput').click()">Select</button>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Audio File</label>
                <div class="input-group">
                    <input type="file" class="form-control" name="audio_file" id="audioInput" accept="audio/*" style="display: none;">
                    <input type="text" class="form-control" readonly placeholder="Select Audio" aria-label="Select Audio" aria-describedby="buttonAudio" onclick="document.getElementById('audioInput').click()">
                    <button class="btn btn-outline-secondary" type="button" id="buttonAudio" onclick="document.getElementById('audioInput').click()">Select</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">Lyrics</label>
                <textarea class="form-control" name="lyrics" placeholder="Lyrics">{{ $song->lyrics }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
