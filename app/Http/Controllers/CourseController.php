<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Mostrar una lista de cursos
    public function index(Request $request)
    {
        // Traer todas las materias para el filtro
        $subjects = Subject::all();

        // Filtrar cursos por materia si se selecciona un filtro
        $query = Course::with('subject');
        if ($request->has('subject_id') && $request->subject_id) {
            $query->where('subject_id', $request->subject_id);
        }

        $courses = $query->get();

        return view('courses.index', compact('courses', 'subjects'));
    }

    // Mostrar el formulario para crear un nuevo curso
    // Trae todos los cursos disponibles para mostrarlos y poder seleccionarlos
    public function create()
    {
        $subjects = Subject::all();  // Traer todos los subjects disponibles
        return view('courses.create', compact('subjects'));
    }

    // Almacenar un nuevo curso
    public function store(Request $request)
    {
        // Validar que el subject_id exista en la base de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',  // Validar que el subject_id exista
        ]);

        // Crear el curso
        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course creado exitosamente.');
    }

    // Mostrar un curso específico
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Mostrar el formulario para editar un curso
    public function edit(Course $course)
    {
        $subjects = Subject::all();  // Traer todos los subjects disponibles
        return view('courses.edit', compact('course', 'subjects'));
    }

    // Actualizar un curso específico
    public function update(Request $request, Course $course)
    {
        // Validar que el subject_id exista en la base de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',  // Validar que el subject_id exista
        ]);

        // Actualizar el curso
        $course->update($request->all());

        return redirect()->route('courses.index')
                            ->with('success', 'Course actualizado exitosamente.');
    }

    // Eliminar un curso específico
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course eliminado exitosamente.');
    }
}
