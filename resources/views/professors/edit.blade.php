@extends('layouts.invention')

@section('titulo', 'Editar Profesor')

@section('contenido')
    <div class="container">
        <h2>Editar Profesor</h2>
        
        <form action="{{ route('professors.update', $professor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $professor->name }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="specialization">Especialización:</label>
                <input type="text" id="specialization" name="specialization" class="form-control" value="{{ $professor->specialization }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Actualizar Profesor</button>
        </form>
    </div>
@endsection
