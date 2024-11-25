@extends('layouts.invention')

@section('titulo', 'Contacto ')

@section('contenido')
<h2>Formulario de Contacto</h2>
<form action="/enviar-contacto" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
    </div>
    <button type="submit" class="submit-button">Enviar</button>
</form>

@endsection

