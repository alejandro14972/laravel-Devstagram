@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
<hr>
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="md:w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/usuario.svg') }}" alt="">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
            {{-- <p class="">{{ auth()->user()->username }}</p> --}}
            <p class="mt-5">{{ $user->username }}</p>

            <p class="text.gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal">
                    seguidores
                </span>
            </p>

            <p class="text.gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal">
                    siguiendo
                </span>
            </p>

            <p class="text.gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal">
                    post
                </span>
            </p>

        </div>
    </div>
</div>


@endsection

