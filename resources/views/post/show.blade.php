@extends('layouts.app')

@section('titulo')
{{$post->titulo}}<br>
{{$post->descripcion}}
@endsection


@section('contenido')

<img src="{{asset('uploads').'/'.$post->imagen}}" alt="">

@endsection