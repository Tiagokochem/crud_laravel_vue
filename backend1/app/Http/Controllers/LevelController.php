<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return response()->json(Level::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|max:255',
        ]);

        $level = Level::create($request->all());

        return response()->json($level, 201);
    }

    public function show($id)
    {
        $level = Level::findOrFail($id);
        return response()->json($level);
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $request->validate([
            'level' => 'required|string|max:255',
        ]);

        $level->update($request->all());

        return response()->json($level);
    }

    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return response()->json(null, 204);
    }
}
