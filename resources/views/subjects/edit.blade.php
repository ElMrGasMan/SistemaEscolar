@extends('layouts.invention')

@section('titulo', 'Editar materia')

@section('contenido')
    <div class="container">
        <h2>Editar Materia</h2>
        
        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $subject->name }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Actualizar Materia</button>
        </form>
    </div>
@endsection


