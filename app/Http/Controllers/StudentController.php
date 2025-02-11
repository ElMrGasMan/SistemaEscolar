<?php

namespace App\Http\Controllers;

use App\Models\Course_student;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Student::query();
        
        // Filtrar por nombre (orden alfabético)
        if ($request->filled('sort_name')) {
            $query->orderBy('name', $request->sort_name == 'asc' ? 'asc' : 'desc');
        }

        // Filtrar por curso
        if ($request->filled('course_id')) {
            $query->whereHas('courses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            });
        }

        $students = $query->get();

        // Obtener lista de cursos para el filtro
        $courses = \App\Models\Course::all();

        return view('student.index', compact('students', 'courses'));
    }

    //
    public function create()
    {
        return view('student.edit');
    }

    //
    public function store(Request $request){
        //dd($request->name .' email    '.$request->email);
        $v= $request->validate(
        ['name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email,']
        );
        $student = new Student();
        $student->name = $request->name; 
        $student->email = $request->email;      
        $student->save();

        return redirect()->route('students.index')->with('success','Estudiante creado');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }

    //
    public function update(Request $request, Student $student){

        //dd($request->course_id);
        $v= $request->validate(
            ['name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email,'.$student->id, 
            'course_id'=>'required']
        );

        $student->update($v);
        
        return redirect()->route('students.index')->with('success','Estudiante acctualizado');
    }

    public function show(Student $student)
    {
        //dd($student->name);
        return view('student.show',compact('student'));
    }

    //
    public function destroy(Request $request, Student $student)
    {
        //dd( $student->id);
        $student->delete();
        return redirect()->route('students.index')->with('success','Estudiante '.$student->id.' se elimino');
    }
}
