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
           <!--  @if(auth()->user())
                <p>autenticado</p>
            @else
                <p>no autenticado</p>
            @endif -->
            @auth
            <nav class="flex gap-2 items-center">
                <a href="{{route('register')}}" class="font-bolt uppercase text-gray-600 text-sm">
                    Hola 
                    <span class="">
                    {{auth()->user()->username}}
                    </span>
                </a>

                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"  class="font-bolt uppercase text-gray-600 text-sm"> 
                        Cerrar sesion
                    </button>
                </form>
            </nav>
            @endauth

            @guest
            <nav>
                <a href="{{route('login')}}" class="font-bolt uppercase text-black-600 text-sm">
                    Login
                </a>

                <a href="{{route('register')}}" class="font-bolt uppercase text-gray-600 text-sm">
                    Crear cuenta
                </a>
            </nav>
            @endguest
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