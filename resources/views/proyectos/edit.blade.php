@extends('layouts.plantilla')

@section('title', 'Nuevo Registro')

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

<h1>Registro de Prácticas</h1>
<form action="{{ route('practicas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="codigo">Código:</label>
        <input type="number" id="codigo" name="codigo" value="{{ old('codigo') }}" required>
    </div>

    <div class="form-group">
        <label for="idestudiante">ID Estudiante:</label>
        <input type="number" id="idestudiante" name="idestudiante" value="{{ old('idestudiante') }}" required>
    </div>

    <div class="form-group">
        <label for="iddocente">ID Docente:</label>
        <input type="number" id="iddocente" name="iddocente" value="{{ old('iddocente') }}" required>
    </div>

    <div class="form-group">
        <label for="idempresa">ID Empresa:</label>
        <input type="number" id="idempresa" name="idempresa" value="{{ old('idempresa') }}" required>
    </div>

    <div class="form-group">
        <label for="idetapa">ID Etapa:</label>
        <input type="number" id="idetapa" name="idetapa" value="{{ old('idetapa') }}" required>
    </div>

    <div class="form-group">
        <label for="titulo">Título:</label>
        <textarea id="titulo" name="titulo" rows="5" required>{{ old('titulo') }}</textarea>
    </div>

    <button type="submit">Enviar</button>
</form>

@endsection
