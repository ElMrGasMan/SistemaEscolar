@extends('layouts.invention')

@section('titulo', 'course_student')

@section('contenido')
    <div class="container">
        <h2>Crear Nuevo Curso_estudiante</h2>
        
        <form action="{{ route('course_student.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_id">Estudiante_id</label>
                <input type="text" id="student_id" name="student_id" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="course_id">Curso_id:</label>
                <input type="text" id="course_id" name="course_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Curso_estudiante</button>
        </form>
    </div>
@endsection
