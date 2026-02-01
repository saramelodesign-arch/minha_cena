<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.all_bands', compact('bands'));
    }

    public function show($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.view_band', compact('band'));
    }

    public function create()
    {
        return view('bands.add_band');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('bands', 'public');
        }

        Band::create([
            'name' => $request->name,
            'photo' => $photoPath,
        ]);

        return redirect('/bands');
    }

    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.edit_band', compact('band'));
    }

    public function update(Request $request, $id)
    {
        $band = Band::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('bands', 'public');
        }

        $band->update($data);

        return redirect('/bands/' . $band->id);
    }

    public function destroy($id)
    {
        Band::findOrFail($id)->delete();
        return redirect('/bands');
    }
}
