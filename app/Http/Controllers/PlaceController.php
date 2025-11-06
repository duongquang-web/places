<?php
namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        return response()->json(Place::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $place = Place::create($validated);
        return response()->json($place, 201);
    }

    public function show($id)
    {
        $place = Place::find($id);
        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }
        return response()->json($place);
    }

    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $place->update($validated);
        return response()->json($place);
    }

    public function destroy($id)
    {
        $place = Place::find($id);
        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        $place->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
