@extends('layouts.invention')

@section('titulo', 'Profesor')

@section('contenido')
    <div class="container">
        <h2>Lista de Profesores</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('professors.create') }}" class="btn btn-primary mb-3">Crear Profesor</a>
        
        <!-- Formulario de búsqueda -->
        <form action="{{ route('professors.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre"
                        value="{{ old('search', $search ?? '') }}">
                <button type="submit" class="btn btn-secondary">Buscar</button>
            </div>
        </form>
        
        <!-- Tabla de profesores -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especialización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($professors as $professor)
                    <tr>
                        <td>{{ $professor->id }}</td>
                        <td>{{ $professor->name }}</td>
                        <td>{{ $professor->specialization }}</td>
                        <td>
                            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay profesores que coincidan con la búsqueda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection