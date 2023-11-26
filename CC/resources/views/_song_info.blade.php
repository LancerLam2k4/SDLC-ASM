<!-- resources/views/_song_info.blade.php -->

<!-- resources/views/_song_info.blade.php -->

<div class="song-info">
    <div class="song-header">
        <h3>{{ $song->title }}</h3>
        <p class="artist">Artist: {{ $song->artist }}</p>
    </div>
    
    <div class="song-details">
        <div class="song-image">
            <img src="{{ asset('storage/images/' . $song->image) }}" alt="Song Image">
        </div>

        <!-- Nút nghe chứa file âm thanh -->
        <div class="audio-player">
            <audio controls>
                <source src="{{ asset('storage/audio_file/' . $song->audio_file) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>

    <div class="song-meta">
        <p>Created At: {{ $song->created_at }}</p>
        <p>Updated At: {{ $song->updated_at }}</p>
    </div>
</div>

<style>
    /* Trong tệp CSS của bạn */

.song-info {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.song-header {
    margin-bottom: 10px;
}

.song-header h3 {
    margin-bottom: 5px;
}

.artist {
    font-style: italic;
    color: #888;
}

.song-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.audio-player {
    margin-top: 10px;
}

.song-meta {
    margin-top: 15px;
    font-size: 14px;
    color: #777;
}

</style>