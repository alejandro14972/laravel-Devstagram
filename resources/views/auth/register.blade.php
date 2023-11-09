@extends('layouts.app')

@section('titulo')
Registrate devstagram
@endsection


{{-- seccion del formulario de registro --}}
@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12">
        <img src="{{asset('img/registrar.jpg')}}" alt="login">
    </div>

    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Tu nombre"
                class="border p-3 w-full rounded-lg 
                       @error('name')
                         border-red-500
                         value={{old('name')}}
                       @enderror"
                >

                {{-- directiva de error en el formulario para validación del form --}}

                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-5">
                <label for="username" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input 
                type="text" 
                id="username" 
                name="username" 
                placeholder="Tu nombre de usuario"
                class="border p-3 w-full rounded-lg 
                       @error('username')
                         border-red-500
                         value={{old('username')}}
                       @enderror"
                >

                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Tu email"
                class="border p-3 w-full rounded-lg 
                       @error('email')
                         border-red-500
                         value={{old('email')}}
                       @enderror"
                >

                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Contraeña"
                class="border p-3 w-full rounded-lg 
                       @error('password')
                         border-red-500
                         value={{old('password')}}
                       @enderror"
                >

                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-5">
                <label for="password_confirmation" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repite password
                </label>
                <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Repite tu contraeña"
                class="border p-3 w-full rounded-lg 
                       @error('password_confirmation')
                         border-red-500
                         value={{old('password_confirmation')}}
                       @enderror"
                >
            </div>

            <input type="submit"
                   value="Crear cuenta"
                   class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>

@endsection