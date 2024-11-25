<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        return Professor::create($validated);
    }

    public function show($id)
    {
        return Professor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'specialization' => 'sometimes|string|max:255',
        ]);

        $professor->update($validated);

        return $professor;
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return response()->json(['message' => 'Professor deleted successfully']);
    }
}