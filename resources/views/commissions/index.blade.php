
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
        
        
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('commissions.create') }}" class="btn btn-primary">Crear Comisión</a>

            <!-- Formulario de filtros -->
            <form method="GET" action="{{ route('commissions.index') }}" class="d-flex">
                <select name="horario" class="form-control mr-2">
                    <option value="">Todos los horarios</option>
                    @foreach($horarios as $horario)
                        <option value="{{ $horario }}" {{ request('horario') == $horario ? 'selected' : '' }}>
                            {{ $horario }}
                        </option>
                    @endforeach
                </select>

                <select name="curso" class="form-control mr-2">
                    <option value="">Todos los cursos</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ request('curso') == $curso->id ? 'selected' : '' }}>
                            {{ $curso->name }}
                        </option>
                    @endforeach
                </select>
                

                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </form>
        </div>
       
        <a href="{{ route('reports.commissions_and_schedules') }}" class="btn btn-primary">Exportar a PDF</a>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Horarios</th>
                    <th>Curso_id</th>
                    <th>Profesor_id</th>
                    <th>Acciones</th>

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
                            <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display:inline;">
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
