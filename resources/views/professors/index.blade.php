
@extends('layouts.invention')

@section('titulo', 'profesor ')

@section('contenido')
    <div class="container">
        <h2>Lista de Profesores</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        
        <a href="{{ route('professors.create') }}" class="btn btn-primary">Crear Profesor</a>
        <a href="{{ route('reports.professors_and_commissions') }}" class="btn btn-primary">Exportar a PDF</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especialización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professors as $professor)
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
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
