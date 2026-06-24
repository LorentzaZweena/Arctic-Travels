<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\Destination;

class ResortController extends Controller
{
    public function index()
    {
        $resorts = Resort::all();
        return view('admin.dashboard', compact('resorts'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.create-resort', compact('destinations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name'           => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'price'          => 'required|numeric',
            'image'          => 'required|url',
            'description'    => 'required|string',
        ]);

        Resort::create($validatedData);
        return redirect()->route('admin.dashboard')->with('success', 'A new resort has been successfully added!');
    }

    public function edit(Resort $resort)
    {
        $destinations = Destination::all();
        return view('admin.edit-resort', compact('resort', 'destinations'));
    }

    public function update(Request $request, Resort $resort)
    {
        $validatedData = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name'           => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'price'          => 'required|numeric',
            'image'          => 'required|url',
            'description'    => 'required|string',
        ]);

        $resort->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'The resort data has been successfully updated!');
    }

    public function destroy(Resort $resort)
    {
        $resort->delete();

        return redirect()->route('admin.dashboard')->with('success', 'The resort has been successfully deleted!');
    }
}
