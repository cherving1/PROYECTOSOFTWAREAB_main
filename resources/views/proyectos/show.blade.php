@extends('layouts.plantilla')

@section('title', 'Validación: {{$validacion->idValidacion}}')

@section('content')
    <h1>Se encuentra en el registro de la validación: {{$validacion->idValidacion}}</h1>
    <a href="{{route('validaciones.index')}}">Volver a Validaciones</a>
    <br>
    <a href="{{route('validaciones.edit', $validacion)}}">Editar registro</a>

    <p><strong>ID Proyecto: {{$validacion->idProyecto}}</strong></p>
    <p><strong>Estado de Validación: {{$validacion->estadoValidacion}}</strong></p>
    <p><strong>Fecha de Validación: {{$validacion->fechaValidacion}}</strong></p>
    <p><strong>Observaciones: {{$validacion->observaciones}}</strong></p>
@endsection
