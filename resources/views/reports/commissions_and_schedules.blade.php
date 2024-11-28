<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Comisiones y Horarios</title>


    @if(!$isPdf)
        <a href="{{ route('reports.commissions_and_schedules.pdf') }}">Generar PDF</a>
        <!-- ACA VA EL GENERAR EXCEL -->
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
    <h2>Reporte de Comisiones y Horarios</h2>
    <table>
        <thead>
            <tr>
                <th>Comisión</th>
                <th>Aula</th>
                <th>Curso</th>
                <th>Profesor</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->aula }}</td>
                    <td>{{ $commission->course->name }}</td>
                    <td>{{ $commission->professor->name }}</td>
                    <td>{{ $commission->horario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>