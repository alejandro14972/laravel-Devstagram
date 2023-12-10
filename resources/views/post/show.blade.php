@extends('layouts.app')

@section('titulo')
{{$post->titulo}}

@endsection


@section('contenido')

<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{asset('uploads'.'/'.$post->imagen)}}" alt="">


<div class="container mx-auto md:flex">
<div class="md:w-1/2">
    <div class="p-3">
        2 <span class="text-red-500 font-bold">likes</span>
    </div>
</div>

<div class="md:w-1/2 p-3 text-right">
    {{$post->user->username}} {{-- podemos sacar este dato de esta manera porque model post saca una consulta que selecciona el nombre y el username --}}
    <p class="text-sm text-gray-500 ">{{$post->created_at->diffForHumans()}}</p> {{-- uso de la libreria carbon --}}
</div>
</div>

        <div class="font-bold">
            
            <div class="bg-white rounded-lg mt-5">
                <span class="font-bold">Descripción</span>
                <p class="text-sm text-gray-500">
                {{$post->descripcion}}
                </p>
            </div>

            @auth
                @if ($post->user_id == auth()->user()->id)
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar publicación" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white mt-3 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>
    </div>


    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5">
            @auth
                
            
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

            @if (session('mensaje'))
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold">
                    {{session('mensaje')}}
                </div>
            @endif

            <form action="{{route('comentarios.store' , ['post'=>$post, 'user'=>$user])}}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="comentario" for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Comentario
                    </label>
                    <textarea 
                    id="comentario" 
                    name="comentario" 
                    placeholder="Tu comentario de la publicación..."
                    class="border p-3 w-full rounded-lg 
                           @error('comentario')
                             border-red-500
                           @enderror"
                    ></textarea>
                    @error('comentario')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit"
                   value="Añadir comentario"
                   class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg"
            />
            </form>
            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                    <div class="p-5 border-red-700">
                        <a href="{{route('post.index', $comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a>
                        <p>{{$comentario->comentario}}</p>
                        <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                        <hr>
                    </div>
                @endforeach
                    @else
                    <p class="p-10 text-center">No hay comentarios</p>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection