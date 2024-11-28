@extends('layouts.plantilla')

@section('title', 'Actualizar Registro')

@section('content')
    <h1>En esta pagina podra editar un registro</h1>

    <form action="{{route('practicas.update',$practica)}}" method="POST">

        @csrf
        @method('put')
        <label> Codigo:
            <br>
            <input type="number" name="codigo" value="{{$practica->codigo}}">
        </label>
        <br><br>

        <label> Estudiante:
            <br>
            <input type="number" name="idestudiante" value="{{$practica->idestudiante}}">
        </label>
        <br><br>

        <label>Docente:
            <br>
            <input type="number" name="iddocente" value="{{$practica->iddocente}}">
        </label>
        <br><br>

        <label> Empresa:
            <br>
            <input type="number" name="idempresa" value="{{$practica->idempresa}}">
        </label>
        <br><br>
        <label> Etapa:
            <br>
            <input type="number" name="idetapa" value="{{$practica->idetapa}}">
        </label>
        <br><br>
        <label> Titulo:
            <br>
            <textarea name="titulo" rows="5">{{$practica->titulo}}</textarea>
        </label>
        <br><br>

        <button type="submit">Actualizar Formulario</button>
    </form>
@endsection
