
@extends('layouts.invention')

@section('titulo', 'commission ')

@section('contenido')
    <div class="container">
        <h2>Lista de comision</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('Commission.create') }}" class="btn btn-primary">Crear Comision</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Curso_id</th>
                    <th>Profesor_id</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commissions as $commission)
                    <tr>
                        <td>{{ $commission->id }}</td>
                        <td>{{ $commission->aula }}</td>
                        <td>{{ $commission->horario }}</td>
                        <td>{{ $commission->course_id }}</td>
                        <td>{{ $commission->professor_id}}</td>
                        <td>
                            <a href="{{ route('commission.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('commission.destroy', $commission->id) }}" method="POST" style="display:inline;">
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
