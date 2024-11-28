<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Asistencia de Profesores</title>

    
    @if(!$isPdf)
    <!-- ACA VA EL GENERAR PDF -->
        <a href="{{ route('reports.professors_and_commissions.pdf') }}">Generar PDF</a>
        <!-- ACA VA EL GENERAR EXCEL -->
        <a href="{{ route('reports.professors_and_commissions.excel') }}">Generar Excel</a>
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
    <h2>Reporte de Asistencia de Profesores</h2>
    <table>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Comisiones</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professors as $professor)
                <tr>
                    <td>{{ $professor->name }}</td>
                    <td>
                        @foreach ($professor->commissions as $commission)
                            {{ $commission->id }} - {{ $commission->aula }}<br>
                        @endforeach
                    </td>
                    <td> 
                        @foreach ($professor->commissions as $commission)
                            {{$commission->horario}}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>