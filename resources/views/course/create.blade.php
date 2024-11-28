@extends('layouts.invention')

@section('titulo', 'Crear Curso')

@section('contenido')
    <div class="container">
        <h2>Crear Nuevo Curso</h2>
        
        <form action="{{ route('course.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="subject_id">Curso_id:</label>
                <input type="text" id="subject_id" name="subject_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Profesor</button>
        </form>
    </div>
@endsection
