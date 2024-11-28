@extends('layouts.plantilla')

@section('title', 'Nuevo Registro')

@section('content')
    <h1>En esta página para inscribir el proyecto</h1>
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombreProyecto">Nombre del Proyecto:</label>
            <input type="text" id="nombreProyecto" name="nombreProyecto" maxlength="100" required>
        </div>

        <div class="form-group">
            <label for="descripcionProyecto">Descripción del Proyecto:</label>
            <textarea id="descripcionProyecto" name="descripcionProyecto" required></textarea>
        </div>

        <div class="form-group">
            <label for="responsable">Nombre del Responsable:</label>
            <input type="text" id="responsable" name="responsable" maxlength="100" required>
        </div>

        <div class="form-group">
            <label for="fechaInicio">Fecha de Inicio:</label>
            <input type="date" id="fechaInicio" name="fechaInicio" required>
        </div>

        <div class="form-group">
            <label for="fechaFin">Fecha de Fin:</label>
            <input type="date" id="fechaFin" name="fechaFin" required>
        </div>

        <button type="submit">Registrar Proyecto</button>
    </form>

    </form>
@endsection
