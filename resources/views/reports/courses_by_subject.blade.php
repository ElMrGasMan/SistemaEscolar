<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Cursos por Materia</title>
    
    @if(!$isPdf)
        <a href="{{ route('reports.courses_by_subject.pdf') }}">Generar PDF</a>
        <a href="{{ route('reports.courses_by_subject') }}">Generar Excel</a>
    @endif

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>



</head>
<body>
    <h2>Reporte de Cursos por Materia</h2>
    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Cursos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>
                        @foreach ($subject->courses as $course)
                            {{ $course->id }} - {{ $course->name }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>