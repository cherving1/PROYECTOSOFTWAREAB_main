@extends('layouts.plantilla')

@section('title', 'Informes')

@section('content')
    <h1>Gestión de Informes en Extensión Cultural y Proyección Social</h1>

    <a href="{{ route('informes.create') }}">Registrar nuevo informe</a>

    <ul>
        @foreach ($informes as $informe)
            <li>
                <a href="{{ route('informes.show', $informe->idInforme) }}">{{ $informe->descripcionInforme }}</a>
            </li>
        @endforeach
    </ul>

    <!-- Paginación -->
    {{ $informes->links() }}
@endsection
