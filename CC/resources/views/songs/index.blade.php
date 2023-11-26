@extends('layouts.app')

{{-- @section('title', 'List Songs') --}}

@section('contents')
    <div class="container" style="margin-left:225px ">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="mb-4">List Songs</h1>

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

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">Songs</h2>
                    <a href="{{ route('songs.create') }}" class="btn btn-primary">Add Song</a>
                </div>
                <hr />

                @if($songs->count() > 0)
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Artist</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($songs as $song)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $song->title }}</td>
                                    <td>{{ $song->artist }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('songs.show', $song->id) }}" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-warning" style="margin-left:10px;margin-right:10px;border-radius:5px ">Edit</a>
                                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No songs found</p>
                @endif
            </div>
        </div>
    </div>
@endsection
