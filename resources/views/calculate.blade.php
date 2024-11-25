@extends('layouts.invention')

@section('titulo', 'Calculos ')

@section('contenido')
<form action="{{ route('calculate.result') }}" method="POST">
    @csrf
    <label for="number1">Número 1:</label>
    <input type="number" id="number1" name="number1" required><br><br>
    
    <label for="number2">Número 2:</label>
    <input type="number" id="number2" name="number2" required><br><br>
    
    <label for="operation">Operación:</label>
    <select id="operation" name="operation" required>
        <option value="sum">Suma</option>
        <option value="subtract">Resta</option>
        <option value="multiply">Multiplicación</option>
        <option value="divide">División</option>
    </select><br><br>

    <button type="submit">Calcular</button>
</form>

@if(isset($result))
    <h2>Resultado: {{ $result }}</h2>
@endif

@endsection





