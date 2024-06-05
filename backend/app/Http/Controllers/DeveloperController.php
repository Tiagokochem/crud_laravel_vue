<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        return response()->json(Developer::with('level')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|exists:levels,id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'date_of_birth' => 'required|date',
            'hobby' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['age'] = \Carbon\Carbon::parse($request->date_of_birth)->age;

        $developer = Developer::create($data);

        return response()->json($developer, 201);
    }

    public function show($id)
    {
        $developer = Developer::with('level')->findOrFail($id);
        return response()->json($developer);
    }

    public function update(Request $request, $id)
    {
        $developer = Developer::findOrFail($id);

        $request->validate([
            'level_id' => 'sometimes|exists:levels,id',
            'name' => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:M,F',
            'date_of_birth' => 'sometimes|date',
            'hobby' => 'sometimes|string|max:255',
        ]);

        $data = $request->all();
        if (isset($data['date_of_birth'])) {
            $data['age'] = \Carbon\Carbon::parse($request->date_of_birth)->age;
        }

        $developer->update($data);

        return response()->json($developer);
    }

    public function destroy($id)
    {
        $developer = Developer::findOrFail($id);
        $developer->delete();

        return response()->json(null, 204);
    }
}
