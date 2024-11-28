@extends('layouts.plantilla')

@section('content')
    <h1>Bienvenido a Gestión de Extensión Cultural y Proyección Social</h1>


        <li>
            <a href="{{ route('validaciones.create') }}">Validacion acertada</a>
        </li>
        <li>
            <a href="{{ route('validaciones.create') }}">ver las valdiaciones</a>
        </li>
        <li>
            <a href="{{ route('validaciones.create') }}">estado de validacion</a>
        </li>
        <li>
            <a href="{{ route('validaciones.create') }}">validacion confirmada</a>
        </li>

@endsection
