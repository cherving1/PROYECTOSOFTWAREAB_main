@extends('layouts.plantilla')

@section('title', 'Nuevo Registro de Validación')

@section('content')

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

<h1>Registro de Validaciones</h1>
<form action="{{ route('validaciones.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="idProyecto">ID Proyecto:</label>
        <input type="number" id="idProyecto" name="idProyecto" value="{{ old('idProyecto') }}" required>
    </div>

    <div class="form-group">
        <label for="estadoValidacion">Estado de la Validación:</label>
        <input type="text" id="estadoValidacion" name="estadoValidacion" value="{{ old('estadoValidacion') }}" maxlength="50" required>
    </div>

    <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" rows="5">{{ old('observaciones') }}</textarea>
    </div>

    <div class="form-group">
        <label for="fechaValidacion">Fecha de Validación:</label>
        <input type="date" id="fechaValidacion" name="fechaValidacion" value="{{ old('fechaValidacion') }}" required>
    </div>

    <button type="submit">Enviar</button>
</form>

@endsection
