<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--estilos-->
    <style>
        .active {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!--header-->
    <!--nav-->
    <header>
        <h1>Universidad Continental</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('practicas.index') }}" class="{{ request()->routeIs('practicas.*') ? 'active' : '' }}">Prácticas</a></li>
                <li><a href="{{ route('validaciones.index') }}" class="{{ request()->routeIs('validaciones.*') ? 'active' : '' }}">Validaciones</a></li>
                <li><a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a></li>
                <li><a href="{{ route('informes.index') }}" class="{{ request()->routeIs('informes.index') ? 'active' : '' }}">Informes</a></li>
            </ul>
        </nav>
    </header>
    @yield('content')

    <!--footer-->
    <!--script-->
</body>
</html>
