<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index($bandId)
    {
        $band = Band::findOrFail($bandId);
        return view('all_albums', compact('band'));
    }

    public function create($bandId)
    {
        $band = Band::findOrFail($bandId);
        return view('add_album', compact('band'));
    }

    public function store(Request $request, $bandId)
    {
        $request->validate([
            'name' => 'required',
            'cover' => 'nullable|image|max:2048',
            'release_date' => 'nullable|date',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('albums', 'public');
        }

        Album::create([
            'band_id' => $bandId,
            'name' => $request->name,
            'cover' => $coverPath,
            'release_date' => $request->release_date,
        ]);

        return redirect("/bands/$bandId/albums");
    }
}


