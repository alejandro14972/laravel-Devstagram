@extends('layouts.app')

@section('titulo')
    {{$user->username}}
    {{-- Correo: {{$user->email}} --}}
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

<section class="conttainer mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">
        Publicaciones
    </h2>

    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div>
            <a href="{{route('posts.show', ['post'=>$post, 'user'=>$user])}}"> {{-- pasar multiples valores --}}
                <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->imagen}}">
            </a>
           
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{$posts->links('pagination::simple-tailwind')}} {{-- paginación de la página. mirar archivo tailwind.config.js--}}
</div>

    @else
        <p class="uppercase text-gray-950 text-sm text-center font-bold"> no hay posts</p>
    @endif

</section>


@endsection

