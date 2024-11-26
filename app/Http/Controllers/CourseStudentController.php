<?php

namespace App\Http\Controllers;


use App\Models\Course_student;
use App\Models\Course;
use App\Models\Commission;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    // Mostrar una lista de todas las inscripciones
    public function index()
    {
        $courseStudents = Course_student::with(['student', 'course', 'commission'])->get();
        return view('course_students.index', compact('courseStudents'));
    }

    // Mostrar el formulario para crear una nueva inscripción
    public function create()
    {
        $courses = Course::all();    // Traer todos los cursos disponibles
        $students = Student::all();  // Traer todos los estudiantes disponibles
        return view('course_students.create', compact('courses', 'students'));
    }

    // Almacenar una nueva inscripción
    public function store(Request $request)
    {
        // Validar los campos
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar que la comisión pertenezca al curso seleccionado
        $commission = Commission::where('id', $request->commission_id)
                                ->where('course_id', $request->course_id)
                                ->first();

        if (!$commission) {
            return redirect()->back()->withErrors(['commission_id' => 'La comisión seleccionada no pertenece al curso.']);
        }

        // Verificar que el estudiante no esté inscrito en el mismo curso y comisión
        $exists = Course_student::where('student_id', $request->student_id)
                            ->where('course_id', $request->course_id)
                            ->where('commission_id', $request->commission_id)
                            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['student_id' => 'El estudiante ya está inscrito en este curso y comisión.']);
        }

        // Crear la inscripción
        Course_student::create($request->all());

        return redirect()->route('course_students.index')
                        ->with('success', 'Inscripción creada exitosamente.');
    }

    // Mostrar una inscripción específica
    public function show(Course_student $courseStudent)
    {
        return view('course_students.show', compact('courseStudent'));
    }

    // Mostrar el formulario para editar una inscripción específica
    public function edit(Course_student $courseStudent)
    {
        $courses = Course::all();
        $students = Student::all();
        $commissions = Commission::where('course_id', $courseStudent->course_id)->get();
        return view('course_students.edit', compact('courseStudent', 'courses', 'students', 'commissions'));
    }

    // Actualizar una inscripción específica
    public function update(Request $request, Course_student $courseStudent)
    {
        // Validar los campos
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar que la comisión pertenezca al curso seleccionado
        $commission = Commission::where('id', $request->commission_id)
                                ->where('course_id', $request->course_id)
                                ->first();

        if (!$commission) {
            return redirect()->back()->withErrors(['commission_id' => 'La comisión seleccionada no pertenece al curso.']);
        }

        // Verificar que el estudiante no esté inscrito en el mismo curso y comisión (excluyendo la actual)
        $exists = Course_student::where('student_id', $request->student_id)
                            ->where('course_id', $request->course_id)
                            ->where('commission_id', $request->commission_id)
                            ->where('id', '!=', $courseStudent->id)
                            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['student_id' => 'El estudiante ya está inscrito en este curso y comisión.']);
        }

        // Actualizar la inscripción
        $courseStudent->update($request->all());

        return redirect()->route('course_students.index')->with('success', 'Inscripción actualizada exitosamente.');
    }

    // Eliminar una inscripción específica
    public function destroy(Course_student $courseStudent)
    {
        $courseStudent->delete();

        return redirect()->route('course_students.index')->with('success', 'Inscripción eliminada exitosamente.');
    }
}
