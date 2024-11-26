@extends('layouts.invention')

@section('titulo', 'Crear materia')

@section('contenido')
    <div class="container">
        <h2>Crear Materia</h2>
        
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Materia</button>
        </form>
    </div>
@endsection
