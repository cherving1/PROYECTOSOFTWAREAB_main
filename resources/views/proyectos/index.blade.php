@extends('layouts.plantilla')

@section('content')
    <h1>Bienvenido a Gestión de Extensión Cultural y Proyección Social</h1>


        <li>
            <a href="{{ route('proyectos.create') }}">Registrar tu proyecto</a>
        </li>
        <li>
            <a href="{{ route('proyectos.create') }}">Ver los proyectos registrados</a>
        </li>
        <li>
            <a href="{{ route('proyectos.create') }}">Ver los proyectos aprobados</a>
        </li>
        <li>
            <a href="{{ route('proyectos.create') }}">Ver si está listo tu certificado</a>
        </li>

@endsection
