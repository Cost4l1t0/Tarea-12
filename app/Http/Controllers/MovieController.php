<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Movie::with('characters')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'classification' => 'required|in:horror,slasher,thriller,suspense,action,drama',
            'release_date'   => 'required|date',
            'review'         => 'required|string',
            'season'         => 'nullable|integer|min:1',
        ]);

        $movie = Movie::create($data);

        return response()->json($movie, 201);
    }

    public function show(Movie $movie): JsonResponse
    {
        return response()->json($movie->load('characters'));
    }

    public function update(Request $request, Movie $movie): JsonResponse
    {
        $data = $request->validate([
            'name'           => 'sometimes|string|max:255',
            'classification' => 'sometimes|in:horror,slasher,thriller,suspense,action,drama',
            'release_date'   => 'sometimes|date',
            'review'         => 'sometimes|string',
            'season'         => 'nullable|integer|min:1',
        ]);

        $movie->update($data);

        return response()->json($movie);
    }

    public function destroy(Movie $movie): JsonResponse
    {
        $movie->delete();

        return response()->json(['message' => 'Pelicula eliminada']);
    }
}
