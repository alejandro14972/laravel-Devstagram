@extends('layouts.app')

@section('titulo')
Inicia sesion en devstagram
@endsection


{{-- seccion del formulario de registro --}}
@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12">
        <img src="{{asset('img/login.jpg')}}" alt="login">
    </div>

    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-lg">
        <form  method="post" action="{{route('login')}}" novalidate>
            @csrf

            @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                {{session('mensaje')}}
            </p>
            @endif

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
                <input type="checkbox" name="remember" id=""> <label for="">mantener sesión abierta</label>
            </div>

            <input type="submit"
                   value="Iniciar sesión"
                   class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>

@endsection