@extends('layouts.app')

@section('title', 'Create Song')

@section('contents')
<div class="container" style="margin-left:225px ">
    <div class="row">
        <div class="col-md-8 mt-4">
            <h1 class="mb-0">Add Song</h1>
            <hr />

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3">Song Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3">Artist</label>
                    <div class="col-sm-9">
                        <input type="text" name="artist" class="form-control" placeholder="Artist">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3">Song Image</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" class="form-control" name="image" id="imageInput" style="display: none;" accept="image/*">
                            <input type="text" class="form-control" readonly placeholder="Select Image" aria-label="Select Image" aria-describedby="buttonImage" onclick="document.getElementById('imageInput').click()">
                            <button class="btn btn-outline-secondary" type="button" id="buttonImage" onclick="document.getElementById('imageInput').click()">Select</button>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3">Audio Path</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" class="form-control" name="audio_file" id="audioInput" style="display: none;" accept="audio/*">
                            <input type="text" class="form-control" readonly placeholder="Select Audio" aria-label="Select Audio" aria-describedby="buttonAudio" onclick="document.getElementById('audioInput').click()">
                            <button class="btn btn-outline-secondary" type="button" id="buttonAudio" onclick="document.getElementById('audioInput').click()">Select</button>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3">Lyrics</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="lyrics" placeholder="Lyrics"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
