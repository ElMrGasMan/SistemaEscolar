
@extends('layouts.invention')

@section('titulo', 'materia ')

@section('contenido')
    <div class="container">
        <h2>Lista de materias</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Crear Materia</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subjects)
                    <tr>
                        <td>{{ $subjects->id }}</td>
                        <td>{{ $subjects->name }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subjects->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <!-- Para eliminar una materia -->
                            <form action="{{ route('subjects.destroy', $subjects) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
