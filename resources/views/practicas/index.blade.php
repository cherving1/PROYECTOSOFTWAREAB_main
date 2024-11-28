@extends('adminlte::page')
@section('title', 'Practicas Preprofesionales')

@section('content_header')
    <h1>Bienvenido a la Gestión de Prácticas Preprofesionales</h1>
@stop

@section('content')
    <a href="{{route('practicas.create')}}">Nuevo registro</a>
    <ul>
        <table class="table table-bordered table-hover dataTable dtr-inline collapsed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Código</th>
                    <th>Título</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicas as $practica)
                <tr>
                    <th><button type="button" class="btn btn-block btn-warning"><a href="{{route('practicas.show',$practica->id)}}">Editar</a>
                        </button>
                    </th>
                    <th>{{ $practica->codigo }}</th>
                    <th>{{ $practica->titulo }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
    {{ $practicas->links() }}
@stop
