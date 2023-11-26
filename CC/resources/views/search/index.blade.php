@extends('layouts.app')

@section('title', 'Search Results')

@section('contents')
    <div style="margin-left:225px">
        <h1>Search Results for "{{ $search }}"</h1>

    @if(count($results) > 0)
        <ul>
            @foreach($results as $result)
                <li>{{ $result->title }} by {{ $result->artist }}</li>
                    @include('_song_info', ['song' => $result])
                
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
    </div>
@endsection
