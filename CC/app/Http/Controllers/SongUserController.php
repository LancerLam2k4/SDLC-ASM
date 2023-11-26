<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class SongUserController extends Controller
{
    public function index()
    {
        $usersongs = Song::orderBy('created_at', 'DESC')->get();

        return view('usersongs.index', compact('usersongs'));
    }
    public function play($id)
    {
        // Lấy thông tin bài hát từ database
        $usersongs = Song::findOrFail($id);

        // Thực hiện logic phát nhạc ở đây (ví dụ: trả về view với thông tin bài hát)
        return view('usersongs.play', compact('usersongs'));
    }
    public function create()
    {
        return view('usersongs.create');
    }
    public function store(Request $request)
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
}
