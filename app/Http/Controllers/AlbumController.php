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
        return view('albums.all_albums', compact('band'));
    }

    public function create($bandId)
    {
        $band = Band::findOrFail($bandId);
        return view('albums.add_album', compact('band'));
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

    public function edit($id)
{
    $album = Album::findOrFail($id);
    return view('albums.edit_album', compact('album'));
}

public function update(Request $request, $id)
{
    $album = Album::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'cover' => 'nullable|image|max:2048',
        'release_date' => 'nullable|date',
    ]);

    $data = [
        'name' => $request->name,
        'release_date' => $request->release_date,
    ];

    if ($request->hasFile('cover')) {
        $data['cover'] = $request->file('cover')->store('albums', 'public');
    }

    $album->update($data);

    return redirect('/bands/' . $album->band_id . '/albums');
}

public function destroy($id)
{
    $album = Album::findOrFail($id);
    $bandId = $album->band_id;

    $album->delete();

    return redirect('/bands/' . $bandId . '/albums');
}

}


