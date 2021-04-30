@extends('layouts.template01')

@section('title', 'Deletar Post')    

@section('content')

    <h3>Detalhes de <b>{{$post->title}}</b></h3>
    <img width="300"  src="{{ url("storage/{$post->image}") }}" alt="">
    <p>{{$post->content }}</p>
    <p>Criado em: {{$post->created_at }}</p>
    <p>Última modificação: {{$post->updated_at }}</p>
    <p><a href="{{ route('posts.edit', $post->id) }}">Editar</a></p>

    <form action="{{ route('posts.delete', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
        <button type="submit">Deletar</button>
    </form>

@endsection

