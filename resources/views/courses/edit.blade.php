@extends('layouts.invention')

@section('titulo', 'Editar Curso')

@section('contenido')
    <div class="container">
        <h2>Editar Curso</h2>
        
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $course->name }}" required>
            </div>
            
            <div class="form-group mt-2">
                <label for="subject_id">Especialización:</label>
                <input type="text" id="subject_id" name="subject_id" class="form-control" value="{{ $course->subject_id }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Actualizar Profesor</button>
        </form>
    </div>
@endsection
