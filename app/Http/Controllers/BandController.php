<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('all_bands', compact('bands'));
    }

    public function show($id)
    {
        $band = Band::findOrFail($id);
        return view('view_band', compact('band'));
    }

    public function create()
    {
        return view('add_band');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
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
}
