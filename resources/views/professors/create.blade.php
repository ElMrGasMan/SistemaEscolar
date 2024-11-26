@extends('layouts.invention')

@section('titulo', 'Crear Profesor')

@section('contenido')
    <div class="container">
        <h2>Crear Nuevo Profesor</h2>
        
        <form action="{{ route('professors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="specialization">Especialización:</label>
                <input type="text" id="specialization" name="specialization" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Profesor</button>
        </form>
    </div>
@endsection
