<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    /**
     * Show upload form.
     */
    public function create()
    {
        // Fetch users for selection demo
        $users = User::all();
        return view('profile.upload', compact('users'));
    }

    /**
     * Handle upload, validation, renaming, and saving file path.
     */
    public function store(Request $request)
    {
        // 1. Validation: JPEG & PNG only, Max 2MB (2048 KB)
        $request->validate([
            'user_id'         => 'required|exists:users,id',
            'profile_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'profile_picture.required' => 'Please choose a profile picture to upload.',
            'profile_picture.mimes'    => 'Only JPEG and PNG image formats are allowed.',
            'profile_picture.max'      => 'Profile picture size must not exceed 2MB.',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            // 2. Custom Filename: {user_id}_{timestamp}.{extension}
            $filename = $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

            // 3. Store in public disk under 'profile_pics' directory
            $path = $file->storeAs('profile_pics', $filename, 'public');

            // 4. Save file path into database
            $user->update([
                'profile_picture' => 'storage/' . $path,
            ]);

            return redirect()->route('profile.gallery')
                ->with('success', "Profile picture uploaded successfully for {$user->name}!");
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

    /**
     * Gallery page listing all uploaded profile pictures.
     */
    public function gallery()
    {
        $usersWithPics = User::whereNotNull('profile_picture')->get();

        return view('profile.gallery', compact('usersWithPics'));
    }
}