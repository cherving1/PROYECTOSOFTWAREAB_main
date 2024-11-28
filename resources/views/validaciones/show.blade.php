@extends('layouts.plantilla')

@section('title', 'validacion: {{$validacion->titulo}}')

@section('content')
    <h1>Se encuentra en el registro: {{$validacion->titulo}}</h1>
    <a href="{{route('validacion.index')}}">Volver a Validacion</a>
    <br>
    <a href="{{route('validacion.edit',$validacion)}}">Editar registro</a>
    <a href="">Editar registro</a>
    <p><strong>Código: {{$proyecto->codigo}}</strong></p>
@endsection
