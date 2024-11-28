@extends('layouts.invention')

@section('titulo', 'Editar Commission')

@section('contenido')
    <div class="container">
        <h2>Editar Comision</h2>
        
        <form action="{{ route('commissions.update', $commission->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="aula">Aula:</label>
                <input type="text" id="aula" name="aula" class="form-control" value="{{ $commission->aula }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="horario">Horario:</label>
                <input type="text" id="horario" name="horario" class="form-control" value="{{ $commission->horario }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="course_id">Curso_id:</label>
                <input type="text" id="course_id" name="course_id" class="form-control" value="{{ $commission->course_id }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="horario">Horario:</label>
                <input type="text" id="professor_id" name="professor_id" class="form-control" value="{{ $commission->professor_id }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Actualizar Profesor</button>
        </form>
    </div>
@endsection
