
@extends('layouts.invention')

@section('titulo', 'course_student ')

@section('contenido')
    <div class="container">
        <h2>Lista de Curso_estudiante</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('course_students.create') }}" class="btn btn-primary">Crear Curso_estudiante</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante_id</th>
                    <th>Curso_id</th>
                    <th>Comision_id</th>
                    <th>Botones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseStudents as $courseStudent)
                    <tr>
                        <td>{{ $courseStudent->id }}</td>
                        <td>{{ $courseStudent->student_id }}</td>
                        <td>{{ $courseStudent->course_id }}</td>
                        <td>{{ $courseStudent->commission_id }}</td>
                        <td>
                            <a href="{{ route('course_students.edit', $courseStudent->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('course_students.destroy', $courseStudent->id) }}" method="POST" style="display:inline;">
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
