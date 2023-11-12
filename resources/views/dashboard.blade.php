@extends('layouts.app')

@section('titulo')
tu cuenta

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
        <div class="md:w-8/12 lg:w-6/12 px-5">
            </div>
                <img src="{{asset('img/usuario.svg')}}" alt="">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                        <p class="">{{auth()->user()->username}}</p>
            </div>
        </div>
    </div>
</div>

@endsection

