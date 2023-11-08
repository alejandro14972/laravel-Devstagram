<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    <nav>
        <a href="/">Principal</a>
        <a href="/nosotros">nosotros</a>
        <a href="/tienda">tienda</a>
        <a href="/contacto">contacto</a>
    </nav>


    <h1 class="text-5xl font-extrabold">@yield('titulo')</h1>
    <hr>
    <p>@yield('contenido')</p>

</body>

</html>