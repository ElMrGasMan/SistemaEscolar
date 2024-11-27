<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Estudiantes Inscritos</title>
</head>
<body>
    <h1>Estudiantes Inscritos</h1>
    
    @if(!$isPdf)
        <a href="{{ route('reports.enrolled_students.pdf') }}">Generar PDF</a>
        <a href="{{ route('reports.enrolled_students.excel') }}">Generar Excel</a>
    @endif
    
    @if($students->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre del Estudiante</th>
                    <th>Cursos</th>
                    <th>Comisiones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            @foreach ($student->courses as $course)
                                {{ $course->id }} - {{ $course->name }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($student->commissions as $commission)
                                {{ $commission->id }} - {{ $commission->aula }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay estudiantes inscritos.</p>
    @endif
</body>
</html>