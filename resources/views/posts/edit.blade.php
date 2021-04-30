@extends('layouts.template01')

@section('title', 'Alterar Post')    

@section('content')

    <h2>Editar Post</h2>
    @if ($errors->any())    
        @foreach ($errors->all() as $error)
            <div style="background-color: red; color: #fff; border-radius:4px; text-align: center;width:400px;margin:5px;padding:5px">
                {{ $error }}        
            </div>
            
        @endforeach
    @endif
    <img width="400"  src="{{ url("storage/{$post->image}") }}" alt="">
    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('posts._partials.form')
        
    </form>

@endsection