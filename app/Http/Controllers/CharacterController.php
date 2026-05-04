<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Character::with('movies')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'picture'     => 'nullable|image|max:2048',
            'movie_ids'   => 'nullable|array',
            'movie_ids.*' => 'exists:movies,id',
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('characters', 'public');
        }

        $character = Character::create($data);

        if (!empty($data['movie_ids'])) {
            $character->movies()->sync($data['movie_ids']);
        }

        return response()->json($character->load('movies'), 201);
    }

    public function show(Character $character): JsonResponse
    {
        return response()->json($character->load('movies'));
    }

    public function update(Request $request, Character $character): JsonResponse
    {
        $data = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'picture'     => 'nullable|image|max:2048',
            'movie_ids'   => 'nullable|array',
            'movie_ids.*' => 'exists:movies,id',
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('characters', 'public');
        }

        $character->update($data);

        if ($request->has('movie_ids')) {
            $character->movies()->sync($data['movie_ids'] ?? []);
        }

        return response()->json($character->load('movies'));
    }

    public function destroy(Character $character): JsonResponse
    {
        $character->delete();

        return response()->json(['message' => 'Personaje eliminado']);
    }
}
