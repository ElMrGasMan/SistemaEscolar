
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
        
        <a href="{{ route('course_student.create') }}" class="btn btn-primary">Crear Curso_estudiante</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante_id</th>
                    <th>Curso_id</th>
                    <th>Comision_id</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course_students as $course_student)
                    <tr>
                        <td>{{ $course_student->id }}</td>
                        <td>{{ $course_student->student_id }}</td>
                        <td>{{ $course_student->course_id }}</td>
                        <td>{{ $course_student->commission_id }}</td>
                        <td>
                            <a href="{{ route('course_student.edit', $course_student->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('course_student.destroy', $course_student->id) }}" method="POST" style="display:inline;">
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
