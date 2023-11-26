<!-- resources/views/songs/index.blade.php -->

@extends('userlayouts.app')

@section('title', 'Hot Music')

@section('contents')
    <div class="container" style="margin-left: 225px">
        <h1 style="color: #8a2be2;text-align: center;">Hot Music</h1>

        @if($usersongs->count() > 0)
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Sr. No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usersongs as $usersongs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/images/' . $usersongs->image) }}" alt="{{ $usersongs->title }}" style="max-width: 100px;"></td>
                            <td>{{ $usersongs->title }}</td>
                            <td>{{ $usersongs->artist }}</td>
                           <td><audio class="audio-player" controls style="margin-left:20%">
                                <source src="{{ asset('storage/audio_file/' . $usersongs->audio_file) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No songs found</p>
        @endif
        <script>
            // Lưu trữ bộ phát âm thanh hiện tại
            var currentAudio = null;

            // Lắng nghe sự kiện click trên bất kỳ nút phát âm thanh nào
            document.querySelectorAll('.audio-player').forEach(function(player) {
                player.addEventListener('play', function() {
                    // Dừng bộ phát âm thanh hiện tại (nếu có)
                    if (currentAudio && currentAudio !== this) {
                        currentAudio.pause();
                    }
                    // Cập nhật bộ phát hiện tại
                    currentAudio = this;
                });
            });
        </script>
    </div>
@endsection
