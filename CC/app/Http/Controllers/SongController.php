<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Song;
use Illuminate\Http\Response;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::orderBy('created_at', 'DESC')->get();

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $imageName = Str::random(32) . '.' . $request->image->getClientOriginalExtension();
            $audioName = Str::random(32) . '.' . $request->audio_file->getClientOriginalExtension();
        
            // Create Song
            Song::create([
                'title' => $request->title,
                'artist' => $request->artist,
                'image' => $imageName,
                'audio_file' => $audioName,
                'lyrics' => $request->lyrics,
            ]);
        
            // Save Image in Storage folder
            Storage::disk('public')->put('images/' . $imageName, file_get_contents($request->image));
        
            // Save Audio in Storage folder
            Storage::disk('public')->put('audio_file/' . $audioName, file_get_contents($request->audio_file));
        
            // Set success message in session
            session()->flash('success', 'Song successfully created.');
    
            // Redirect back to the previous page
            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in store method: ' . $e->getMessage());
    
            // Set error message in session
            session()->flash('error', 'Something went really wrong!');
    
            // Redirect back to the previous page
            return redirect()->back();
        }
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $songs = Song::findOrFail($id);

        return view('songs.show', compact('songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::findOrFail($id);

        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        try {
            $song = Song::findOrFail($id);
    
            // Update title and artist
            $song->update([
                'title' => $request->input('title'),
                'artist' => $request->input('artist'),
                'lyrics' =>$request->input('lyrics'),
            ]);
    
            // Update image
            if ($request->hasFile('image')) {
                // Public storage
                $storage = Storage::disk('public');
    
                // Old image delete
                if ($storage->exists('images/' . $song->image)) {
                    $storage->delete('images/' . $song->image);
                }
    
                // Image name
                $imageName = Str::random(32) . "." . $request->file('image')->getClientOriginalExtension();
                $song->update(['image' => $imageName]);
    
                // Image save in public folder
                $storage->put('images/' . $imageName, file_get_contents($request->file('image')));
            }
    
            // Update audio path
            if ($request->hasFile('audio_file')) {
                // Public storage
                $storage = Storage::disk('public');
    
                // Old audio path delete
                if ($storage->exists('audio_file/' . $song->audio_file)) {
                    $storage->delete('audio_file/' . $song->audio_file);
                }
    
                // Audio name
                $audioName = Str::random(32) . "." . $request->file('audio_file')->getClientOriginalExtension();
                $song->update(['audio_file' => $audioName]);
    
                // Audio save in public folder
                $storage->put('audio_file/' . $audioName, file_get_contents($request->file('audio_file')));
            }
            $song->save();
            // Return a success message
            session()->flash('success', 'Song successfully created.');
    
            // Redirect back to the previous page
            return redirect()->back();
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Error updating song: ' . $e->getMessage());
    
            // Return a more informative response
            session()->flash('error', 'Something went really wrong!');
    
            // Redirect back to the previous page
            return redirect()->back();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::findOrFail($id);
        $storage = Storage::disk('public');
        if ($storage->exists('images/' . $song->image)) {
            $storage->delete('images/' . $song->image);
        }
        if ($storage->exists('audio_file/' . $song->audio_file)) {
            $storage->delete('audio_file/' . $song->audio_file);
        }
        $song->delete();
    
        session()->flash('success', 'Song successfully created.');
    
            // Redirect back to the previous page
            return redirect()->back();
    }
}
