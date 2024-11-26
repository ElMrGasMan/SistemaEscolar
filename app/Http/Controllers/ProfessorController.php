<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        // Obtener todos los profesores
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function store(Request $request)
    {
        // Validar y crear el profesor
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Professor::create($validated);

        return redirect()->route('professors.index')->with('success', 'Profesor creado exitosamente.');
    }
    public function edit($id)
    {
        // Mostrar formulario para editar un profesor
        $professor = Professor::findOrFail($id);
        return view('professors.edit', compact('professor'));
    }

    public function show($id)
    {
        return Professor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar los datos del profesor
        $professor = Professor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'specialization' => 'sometimes|string|max:255',
        ]);

        $professor->update($validated);

        return redirect()->route('professors.index')->with('success', 'Profesor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Eliminar el profesor
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Profesor eliminado exitosamente.');
    }
    public function create()
    {
        // Retorna la vista para crear un nuevo profesor
        return view('professors.create');
    }
}