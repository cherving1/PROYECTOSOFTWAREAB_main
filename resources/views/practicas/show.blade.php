@extends('layouts.plantilla')

@section('title', 'Practica: {{$practica->titulo}}')

@section('content')
    <h1>Se encuentra en el registro: {{$practica->titulo}}</h1>
    <a href="{{route('practicas.index')}}">Volver a Practicas</a>
    <br>
    <a href="{{route('practicas.edit',$practica)}}">Editar registro</a>

    <p><strong>Código: {{$practica->codigo}}</strong></p>
    <form action="{{ route('practicas.destroy',$practica) }}" method="POST">
        @csrf
        @method('delate')
        <button type="submit">Eliminar</button>
    </form>
@endsection
