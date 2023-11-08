<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <header class="p-5 border-b bg-emerald-700 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                Devstagram
            </h1>
            <nav>
                <a href="#" class="font-bolt uppercase text-gray-600 text-sm">Login</a>
                <a href="{{route('register')}}" class="font-bolt uppercase text-gray-600 text-sm">Crear cuenta</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
            @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
    devstagram - todos los derechos reservados {{now()->year}}
    </footer>

</body>

</html>