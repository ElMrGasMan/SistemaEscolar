<?php

namespace App\Http\Controllers;


use App\Models\Commission;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    // Mostrar una lista de comisiones
    public function index(Request $request)
    {
    $horarios = Commission::select('horario')->distinct()->pluck('horario');
    $cursos = Course::all(); // Obtener todos los cursos

    $query = Commission::query();

    if ($request->filled('horario')) {
        $query->where('horario', $request->horario);
    }

    if ($request->filled('curso')) {
        $query->where('course_id', $request->curso);
    }

    $commissions = $query->with('course')->get(); // Eager loading para Course

    return view('commissions.index', compact('commissions', 'horarios', 'cursos'));
    }


    // Mostrar el formulario para crear una nueva comisión
    public function create()
    {
        $courses = Course::all();        // Traer todos los cursos disponibles
        $professors = Professor::all();  // Traer todos los profesores disponibles
        return view('commissions.create', compact('courses', 'professors'));
    }

    // Almacenar una nueva comisión
    public function store(Request $request)
    {
        // Validar que los IDs existan en la base de datos
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',  // Validar que el course_id exista
            'professor_id' => 'required|exists:professors,id',  // Validar que el professor_id exista
        ]);

        // Crear la comisión
        Commission::create($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión creada exitosamente.');
    }

    // Mostrar una comisión específica
    public function show(Commission $commission)
    {
        return view('commissions.show', compact('commission'));
    }

    // Mostrar el formulario para editar una comisión
    public function edit(Commission $commission)
    {
        $courses = Course::all();        // Traer todos los cursos disponibles
        $professors = Professor::all();  // Traer todos los profesores disponibles
        return view('commissions.edit', compact('commission', 'courses', 'professors'));
    }

    // Actualizar una comisión específica
    public function update(Request $request, Commission $commission)
    {
        // Validar que los IDs existan en la base de datos
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',  // Validar que el course_id exista
            'professor_id' => 'required|exists:professors,id',  // Validar que el professor_id exista
        ]);

        // Actualizar la comisión
        $commission->update($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada exitosamente.');
    }

    // Eliminar una comisión específica
    public function destroy(Commission $commission)
    {
        $commission->delete();

        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada exitosamente.');
    }
}
