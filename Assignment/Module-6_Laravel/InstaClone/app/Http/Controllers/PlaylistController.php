<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::latest()->get();

        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    /*public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|min:3|string|max:255',
            'description' => 'nullable|string',
        ]);

        Playlist::create($validated);

        return redirect()->back()->with('success', 'Added to Library');
    }*/
	//session_11
	public function store(Request $request)
    {
        // 1. Form Validation Rules
        $rules = [
            'name'        => 'required|string|min:3|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];

        // 2. Custom Error Messages
        $customMessages = [
            'name.required'     => 'Playlist name cannot be empty.',
            'cover_image.image' => 'Please upload a valid image file.',
        ];

        // Pass custom messages to validate()
        $validated = $request->validate($rules, $customMessages);

        // 3. Handle File Upload if present
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $validated['cover_image'] = '/storage/' . $path;
        }

        // 4. Create Record
        Playlist::create($validated);

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist created successfully!');
    }

    /**
     * Show edit form for a specific playlist.
     */
    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id);

        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update playlist name using find() and update().
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|string|max:255',
        ]);

        // Find specific playlist record by ID
        $playlist = Playlist::find($id);

        if ($playlist) {
            // Update the name field using Eloquent update()
            $playlist->update([
                'name' => $validated['name'],
            ]);

            return redirect()->route('playlists.index')->with('success', "Playlist updated to '{$playlist->name}'!");
        }

        return redirect()->route('playlists.index')->with('error', 'Playlist not found.');
    }

    public function latest(): JsonResponse
    {
        $playlists = Playlist::latest()->take(5)->get();

        return response()->json($playlists);
    }
	
	/**
     * Remove the specified playlist from storage using Eloquent's delete() method.
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);

        if ($playlist) {
            $playlistName = $playlist->name;
            // Delete the playlist record using Eloquent
            $playlist->delete();

            return redirect()->route('playlists.index')
                ->with('success', "Playlist '{$playlistName}' deleted successfully!");
        }

        return redirect()->route('playlists.index')
            ->with('error', 'Playlist not found.');
    }
}