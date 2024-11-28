@extends('layouts.plantilla')

@section('title', 'Nuevo Registro de Validación')

@section('content')
    <h1>En esta página puedes registrar una nueva validación</h1>
    <form action="{{ route('validaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idProyecto">ID del Proyecto:</label>
            <input type="number" id="idProyecto" name="idProyecto" required>
        </div>

        <div class="form-group">
            <label for="estadoValidacion">Estado de la Validación:</label>
            <input type="text" id="estadoValidacion" name="estadoValidacion" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones:</label>
            <textarea id="observaciones" name="observaciones"></textarea>
        </div>

        <div class="form-group">
            <label for="fechaValidacion">Fecha de la Validación:</label>
            <input type="date" id="fechaValidacion" name="fechaValidacion" required>
        </div>

        <button type="submit">Registrar Validación</button>
    </form>
@endsection
