@extends('layouts.invention')

@section('titulo', 'course ')

@section('contenido')
    <div class="container">
        <h2>Lista de Cursos</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Botón de crear curso -->
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Crear Curso</a>

        <!-- Formulario para filtrar -->
        <form action="{{ route('courses.index') }}" method="GET" class="mt-3">
            <div class="form-group">
                <label for="subject_id">Filtrar por materia:</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    <option value="">-- Seleccionar materia --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary mt-2">Filtrar</button>
        </form>
        
        <!-- Tabla de cursos -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Materia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->subject->name }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay cursos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

