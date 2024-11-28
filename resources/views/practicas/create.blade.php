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
    <h1>En esta página para registrar</h1>
    <form action="{{ route('practicas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo">Codigo:</label>
            <input type="number" id="codigo" name="codigo" required>
        </div>

        <div class="form-group">
            <label for="idestudiante">ID Estudiante:</label>
            <input type="number" id="idestudiante" name="idestudiante" required>
        </div>

        <div class="form-group">
            <label for="iddocente">ID Docente:</label>
            <input type="number" id="iddocente" name="iddocente" required>
        </div>

        <div class="form-group">
            <label for="idempresa">ID Empresa:</label>
            <input type="number" id="idempresa" name="idempresa" required>
        </div>

        <div class="form-group">
            <label for="idetapa">ID Etapa:</label>
            <input type="number" id="idetapa" name="idetapa" required>
        </div>

        <label for="titulo">Título:</label>
        <br><br>
        <textarea name="titulo" rows="5"></textarea>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    </form>
@endsection
