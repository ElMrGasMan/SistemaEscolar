@extends('layouts.invention')

@section('titulo', 'Crear Commission')

@section('contenido')
    <div class="container">
        <h2>Create Commision</h2>
        
        <form action="{{ route('commission.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="aula">Aula:</label>
                <input type="text" id="aula" name="aula" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="horario">Horario:</label>
                <input type="text" id="horario" name="horario" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="course_id">Curso_id:</label>
                <input type="text" id="course_id" name="course_id" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="professor_id">Profesor_id:</label>
                <input type="text" id="professor_id" name="professor_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Comision</button>
        </form>
    </div>
@endsection
