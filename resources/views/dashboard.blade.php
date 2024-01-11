@extends('layouts.app')

@section('titulo')
    {{ $user->username }}
    {{-- Correo: {{$user->email}} --}}
    <hr>
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="md:w-8/12 lg:w-6/12 px-5 mt-2">

                @if ($user->imagen)
                    <img src="{{ asset('perfiles') . '/' . $user->imagen }}" alt="" class="rounded-full ">
                @else
                    <img src="{{ asset('img/usuario.svg') }}" alt="">
                @endif

            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">

                <div class="flex items-center gap-2">
                    <p class="">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text.gray-800 text-sm mb-3 font-bold">
                    {{$user->followers->count()}}
                    <span class="font-normal">
                        @choice('Seguidor|Seguidores', $user->followers->count())
                    </span>
                </p>

                <p class="text.gray-800 text-sm mb-3 font-bold">
                    {{$user->followings->count()}}
                    <span class="font-normal">
                        siguiendo
                    </span>
                </p>

                <p class="text.gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }}
                    <span class="font-normal">
                        post
                    </span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="post">
                                @csrf
                                <input type="submit"
                                    class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Seguir">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit"
                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Dejar de seguir">
                            </form>
                        @endif
                    @endif
                @endauth
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
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}"> {{-- pasar multiples valores --}}
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->imagen }}">
                        </a>

                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $posts->links('pagination::simple-tailwind') }} {{-- paginación de la página. mirar archivo tailwind.config.js --}}
            </div>
        @else
            <p class="uppercase text-gray-950 text-sm text-center font-bold"> no hay posts</p>
        @endif

    </section>


@endsection
