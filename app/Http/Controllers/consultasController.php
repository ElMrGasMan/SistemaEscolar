<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Professor;
use App\Models\course_student;
use App\Models\Commission;

use Illuminate\Http\Request;

class consultasController extends Controller
{
    //Listar materias
    function listarMaterias() {
        // Seleccionar todos los nombres de los cursos
       return $courses = Subject::pluck('name');
    }

    //Listar materias
    function listarMaterias2() {
        // Seleccionar todos los nombres de los cursos
       return $courses = Subject::all();
    }

    function FiltrarAlumnos() {
        // Seleccionar todos los estudiantes cuyo nombre comience con 'A'
       return $students = Student::where('name', 'LIKE', 'A%')->get();
        
    }
    function Alumnos() {
        // Seleccionar todos los estudiantes cuyo nombre comience con 'A'
       return $students = Student::all();
        
    }

    function cursos()  {
        
        return Course::all();
    }

    function alumnos_del_curso2()  {
        $curso=Course::find(2);
        $alumnos=$curso->students()->get();

        return $alumnos;
    }

    function curso_materia() {
        
    // Seleccionar cursos y materias relacionados
    $courses = DB::table('courses')
    ->join('subjects', 'subjects.id', '=', 'courses.subject_id')
    ->get();


    return $courses;
    }


    function CursosConMasDeTresEstudiantes() {
        // Seleccionar cursos con más de 3 estudiantes inscritos
        $courses = DB::table('courses')
        ->join('course_student', 'courses.id', '=', 'course_student.course_id')
        ->select('courses.id', 'courses.name')
        ->groupBy('courses.id','courses.name')
        ->havingRaw('COUNT(course_student.student_id) > 3')
        ->get();

        return $courses;
    }

    function FiltroEstudiantes_2() {
        // Seleccionar todos los estudiantes cuyo nombre comience con 'A'
        $students = DB::table('students')->where('name', 'LIKE', 'Ped%')->get();
        return $students;
    }

    function ProfesoresEspecializacion() {
        // Seleccionar todos los profesores cuya especialización incluya 'programación'
        $professors = DB::table('professors')->where('specialization', 'LIKE', '%Mathematics%')->get();
        return $professors;
        
    }

    function EntreFechas() {
        // Seleccionar todos los cursos que fueron creados entre dos fechas
        $courses = DB::table('courses')
        ->whereBetween('created_at', ['2024-01-01', '2024-12-31'])
        ->get();

        return $courses;
        
    }

    function NuevoEstudiante_Pedro() {
        // Crear un nuevo estudiante
            DB::table('students')->insert([
                'name' => 'Pedro Perez',
                'email' => 'Pedro@example.com'
            ]);
    }

}
