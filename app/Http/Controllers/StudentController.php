<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();

        return view('student.index',compact('students'));
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
        $student->course_id =$request->course_id;
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
    public function destroy(Request $request,Student $student){
       //dd( $student->id);
       $student->delete();
       return redirect()->route('students.index')->with('success','Estudiante '.$student->id.' se elimino');
    }
}
