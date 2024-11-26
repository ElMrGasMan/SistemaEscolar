@extends('layouts.invention')

@section('titulo', 'Editar Curso_estudiante')

@section('contenido')
    <div class="container">
        <h2>Editar Curso_estudiante</h2>
        
        <form action="{{ route('course_students.update', $courseStudent->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="student_id">Nombre:</label>
                <input type="text" id="student_id" name="student_id" class="form-control" value="{{ $courseStudent->student_id }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="course_id">Curso_id:</label>
                <input type="text" id="course_id" name="course_id" class="form-control" value="{{ $courseStudent->course_id }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="commission_id">Comision_id:</label>
                <input type="text" id="commission_id" name="commission_id" class="form-control" value="{{ $courseStudent->commission_id }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Actualizar Curso_estudiante</button>
        </form>
    </div>
@endsection
